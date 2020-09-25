<?php

//    $user = new User();
//    echo $ok = $user->SetUser('PGrata', 'Zxcvbnm123123', 'ikonarussia@gmail.com');

    global $g_adminAuth;

    $msg = '';
    if (Post('is_chk', false))
    {
        $login = Post('admin_login');
        $pwd   = Post('admin_pwd');
        
        $msg = implode('<br>', $g_adminAuth->TryAuth($login, $pwd, true));
        $msg = empty($msg) ? '' : MsgErr($msg);
    }
?>