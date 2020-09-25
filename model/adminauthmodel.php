<?php

    /**
     * Аутентификация входа в админку
     *
     * @author Zmi and GUL
     */
    class AdminAuthModel
    {
        public function TryAuth($login, $pwd)
        {
            global $g_config;

            if ($this->IsAuth())
            {
                header("Location: " . SiteRoot($g_config['admin_auth']['after_login_page']));
                exit();
            }

            $errs = $this->Validate($login, $pwd);
            if (empty($errs))
            {
                $this->RememberUser($login, $pwd);
                header("Location: " . SiteRoot($g_config['admin_auth']['after_login_page']));
                exit();
            }
            
            return $errs;
        }

        protected function Validate($login, $pwd)
        {
            global $g_lang;
            $pwdHash = $this->CreateHash($login, $pwd);

            $errs = array();
            if (empty($login) || empty($pwd))
            {
                $errs[] = $g_lang['admin_login_err_input_login_and_password'];
            }
            elseif (!$this->Chk($login, $pwdHash))
            {
                $errs[] = $g_lang['admin_login_err_incorrect_login_or_password'];
            }

            return $errs;
        }

        protected function RememberUser($login, $pwd)
        {
            $pwdHash = $this->CreateHash($login, $pwd);

            $ret = false;
            if ($login && $pwdHash)
            {
                setcookie('elite_admin_login',   $login);
                setcookie('elite_admin_pwdhash', $pwdHash);
                $ret = true;
            }
            return $ret;
        }

        protected function Chk($login, $pwdHash)
        {
            global $g_config;
            $auths = $g_config['admin_auth']['admins'];
            $ret   = false;
            foreach ($auths as $auth)
            {
                if ($auth['login'] == $login && $this->CreateHash($auth['login'], $auth['pwd']) == $pwdHash)
                {
                    $ret = true;
                    break;
                }
            }
            return $ret;
        }

        public function IsAuth()
        {
            $login   = isset($_COOKIE['elite_admin_login'])   ? $_COOKIE['elite_admin_login']   : '';
            $pwdHash = isset($_COOKIE['elite_admin_pwdhash']) ? $_COOKIE['elite_admin_pwdhash'] : '';
            return $this->Chk($login, $pwdHash);
        }

        public function AutoLogin()
        {
            if (strpos(strtolower(GetQuery()), 'admin/login') === false)
            {
                if (!$this->IsAuth())
                {
                    header("Location: " . SiteRoot('admin/login'));
                    exit();
                }
            }
        }

        public function CreateHash($login, $pwd)
        {
            global $g_config;
            return md5($login . $pwd . $g_config['admin_auth']['salt']);
        }

        public function Out()
        {
            setcookie('elite_admin_login',   '');
            setcookie('elite_admin_pwdhash', '');
        }
    };
?>