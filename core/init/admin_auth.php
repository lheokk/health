<?php

// Часть для админки
    if (strpos(strtolower(GetQuery()), 'admin') === 0) 
    {
        // Меняем папку куда будут складироваться css/js админки
        $g_config['extrapacker']['dir'] = 'extrapacker_admin';
        $g_config['mainTpl'] = 'admin/main_template';
        define('IS_ADMIN_AUTH', false);
        // Стартуем все БД ??????этот инит подключается раньше чем БД
        require_once BASEPATH . 'lib/Db/Db_pdo.php';
        new Db_pdo();

        require_once BASEPATH . 'lib/Auth.php'; //!
        if ((isset($_SESSION['elite_admin_login']) && isset($_SESSION['elite_admin_pwdhash'])) OR ( isset($_POST['admin_login']) && isset($_POST['admin_pwd']))) {
            $g_adminAuth = new Auth();
            $g_adminAuth->AutoLogin();
        } else {
            if (strpos(strtolower(GetQuery()), 'admin/login') === false) {
                header("Location: " . SiteRoot('admin/login'));
                exit();
            }
        }
    }
    else
    {
        define('IS_ADMIN_AUTH', false);
    }
?>