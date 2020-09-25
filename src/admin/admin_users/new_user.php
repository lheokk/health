<?php
    $msg = '';
    if(isset($_POST['create_user']))
    {
		
        if(Post('login') == '')
        {
            $msg = MsgErrAdmin('Введите логин');
        }
        if(Post('pass') == '')
        {
            $msg = MsgErrAdmin('Введите пароль');
        }
		 if(Post('pass') != Post('confirm_pass'))
        {
            $msg = MsgErrAdmin('Пароли не совпадают');
        }
        if(Post('email') == '')
        {
            $msg = MsgErrAdmin('Введите емейл');
        }
        if(!IsValidEmail(Post('email')))
        {
            $msg = MsgErrAdmin('Введите корректный емейл');
			
        }
		
        
        if($msg == '')
        {
            $user = new User();
            $ok = $user->SetUser(Post('login'), Post('pass'), Post('email'));
            if($ok == 1)
            {
                $msg = MsgOkAdmin('Пользователь добавлен');
            }
            else
            {
                $msg = $ok;
            }
        }
    }
?>