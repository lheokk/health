<?php

    if (Post('send', false))
    {
        $message = "
            Name: " . Post('name') . "<br />
            Email: " . Post('email') . "<br />
            Message: " . Post('message') . "<br />
            ";
        SendMail('lheokk@gmail.com', $_SERVER['HTTP_HOST'] . ' - сообщение из конт. формы', $message);
    }

?>