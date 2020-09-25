<?php
    $msg = '';
    if(isset($_POST['create_user']))
    {
        if(Post('login') == '')
        {
            $msg = MsgErr('Введите логин');
        }
        if(Post('pass') == '')
        {
            $msg = MsgErr('Введите пароль');
        }
        if(Post('mail') == '')
        {
            $msg = MsgErr('Введите емейл');
        }
        if(!IsValidEmail(Post('mail')))
        {
            $msg = MsgErr('Введите корректный емейл');
        }
        
        if($msg == '')
        {
            $user = new User();
            $ok = $user->SetUser(Post('login'), Post('pass'), Post('mail'));
            if($ok == 1)
            {
                $msg = MsgOk('Пользователь добавлен');
            }
            else
            {
                $msg = $ok;
            }
        }
    }
?>
