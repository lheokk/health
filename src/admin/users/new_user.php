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
			$reg 				= new UsersList();
			if($reg->IssetMail(Post('email')))
			{
				$msg = MsgErrAdmin('Такой email уже зарегистрирован');
			}
			if($reg->IssetLogin(Post('login')))
			{
				$msg = MsgErrAdmin('Такой логин уже зарегистрирован');
			}
			if($msg == '')
			{
				$reg->login			= Post('login');
				$reg->email			= Post('email');
				$reg->first_name 	= '';
				$reg->last_name		= '';
				$reg->reg_date		= time();
				$reg->hsh_pass		= $reg->CreateHash(Post('login'), Post('pass'));
				$msg = MsgOkAdmin('Пользователь создан');
			}
        }
    }
?>