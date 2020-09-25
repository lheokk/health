<?php
    $msg = '';
    $userId = Get('user_id', 0);
    if($userId != 0)
    {
        $user = new User($userId);
        if(isset($_POST['login']))
        {
            $login  = Post('login', '');
            $mail   = Post('mail', '');
            $group  = (int)Post('group', '');
            
            if($login == '')
            {
                $msg = MsgErr('Введите логин');
            }
            if($user->IssetLogin($login) && $login != $user->login)
            {
                $msg = MsgErr('Данный логин занят');
            }
            if($mail == '')
            {
                $msg = MsgErr('Введите группу');
            }
            if($mail == '')
            {
                $msg = MsgErr('Введите емейл');
            }
            if(!IsValidEmail(Post('mail')))
            {
                $msg = MsgErr('Введите корректный емейл');
            }
            
            if($msg == '')
            {
                $user->login    = $login;
                $user->mail     = $mail;
                $user->group    = $group;
                $msg = MsgOk('Данные о пользователе изменены');
            }
        }
    }
?>
