<?php
    $msg    = '';
    $id     = Get('user_id', NULL);
    if($id === NULL && (int)$id == 0)
    {
        header("Location: " . SiteRoot('admin/users/index'));
        exit();
    }      
    $user   = new User($id);
    
    if(isset($_POST['change_pass']))
    {
        $errs    = '';
        $pass    = Post('pass',0);
        $confirm = Post('confirm_pass', 0);
        
        if($pass == 0 && $pass == '')
        {
            $errs = MsgErr('Введите пароль');
        }
        if($confirm == 0 && $confirm == '')
        {
            $errs = MsgErr('Введите подтверждение пароля');
        }
        
        if($pass != $confirm)
        {
            $errs = MsgErr('Пароли не совпадают');
        }
        $msg = $errs;
        
        if($errs == '')
        {
            $user->pass = $user->CreateHash($user->login, $pass);
            $msg = MsgOk("Пароль изменен");
        }
    }
    
?>
