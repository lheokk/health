<?php

/**
 * Description of Auth
 *
 * @author Alki
 */
class Auth extends User {
    
    const TABLE = 'user';
    const ADMIN_GROUP = 1;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function TryAuth($login, $pwd, $isAdmin = false)
    {
        global $g_config;

        if($this->IsAuth($isAdmin))
        {
                 header("Location: " . SiteRoot($g_config['admin_auth']['after_login_page']));
                 exit();
        }
        
        $errs = $this->Validate($login, $pwd, $isAdmin);
        if (empty($errs))
        {
            $this->RememberUser($login, $pwd);
            header("Location: " . SiteRoot($g_config['admin_auth']['after_login_page']));
            exit();
        }

        return $errs;
    }
    /**
     * Проверяем авторизован ли юзер
     * @return type bool
     * 
     * Эта и нижняя ф-я Chk пока под вопросом
     */
    public function IsAuth($isAdminAuth = false)
    {
        $login  = isset($_SESSION['elite_admin_login']) ? $_SESSION['elite_admin_login'] : '';
        $pass   = isset($_SESSION['elite_admin_pwdhash']) ? $_SESSION['elite_admin_pwdhash'] : '';
        return $this->Chk($login, $pass, $isAdminAuth);
    }
    
    protected function Chk($login, $pass, $isAdminAuth = false)
    {
		if(isset($_SESSION['elite_admin_login']) && isset($_SESSION['elite_admin_pwdhash'])) 
			return true;
		if($login == '' && $pass == '')
			return false;
        $auth = $isAdminAuth ? $this->AuthAdmin($login, $pass) : $this->AuthUser($login, $pass);
        
        return $auth ? true : false;
    }
    
    /**
     * выход из админки
     */
    public function Out()
    {
		unset($_SESSION['elite_admin_login']);
		unset($_SESSION['elite_admin_pwdhash']);
    }
    
    public function AutoLogin()
    {
        if (strpos(strtolower(GetQuery()), 'admin/login') === false)
        {
            if (!$this->IsAuth(true))
            {
                header("Location: " . SiteRoot('admin/login'));
                exit();
            }
            else if (strtolower(GetQuery()) == 'admin')
            {
                header("Location: " . SiteRoot('admin/default'));
                exit();
            }
        }
    }
    
    protected function Validate($login, $pwd, $isAdminAuth = false)
    {
        global $g_lang;
        $pwdHash = $this->CreateHash($login, $pwd);
        $errs = array();
        if (empty($login) || empty($pwd))
        {
            $errs[] = $g_lang['admin_login_err_input_login_and_password'];
        }
        elseif (!$this->Chk($login, $pwdHash, $isAdminAuth))
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
            $_SESSION['elite_admin_login'] 		= $login;
            $_SESSION['elite_admin_pwdhash'] 	= $pwdHash;
            $ret = true;
        }
        return $ret;
    }
}

?>
