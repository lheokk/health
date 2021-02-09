<?php

    require_once BASEPATH . "lib/PHPMailer_v5.1/class.phpmailer.php";


    define('SENDMAIL_PRIORITY_LOW',     1);
    define('SENDMAIL_PRIORITY_NORMAL',  3);
    define('SENDMAIL_PRIORITY_HIGH',    5);


    function _SendMail($to, $subject, $message, $additionalHeaders, $files, $priority, $config)
    {
        global $g_config;
        $config = array_merge($g_config['sendmail'], $config);

        // Если тестим отсылку на локалке
        if (false)
        {
            $file = BASEPATH . 'tmp/emails_test.txt';
            $mail = "---" . PHP_EOL .
                    "To: " . $to . PHP_EOL .
                    "Subject: " . $subject . PHP_EOL .
                    "Message: " . $message . PHP_EOL .
                    "Headers: " . $additionalHeaders . PHP_EOL .
                    "Files: " . print_r($files, true) . PHP_EOL .
                    "Priority: " . $priority;
            FileSys::WriteFile($file, $mail, true);
            $ret  = 1;
        }
        // Если отсылка на сервере
        else
        {
            $ret  = false;
            $mail = new PHPMailer();
    
            // Устанавливае кодировку письма равную кодировке сайта
            $mail->CharSet = $g_config['charset'];
            $mail->IsHTML(true);
    
            // Устанавливаем имя отправителя (сначала дефолтное)
            $defSender     = $config['sender'];
            $mail->SetFrom($defSender[0], $defSender[1]);
    
            
            $mail->IsSMTP();
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host       = "smtp.yandex.ru";
            $mail->Port       = 465;
    
            $mail->Username   = "noreply@rusmedzdrav.com";
            $mail->Password   = "i2Q8s1UdMHc5";
    
            $mail->SMTPDebug    = 1; // 1 = errors and messages, 2 = messages only
            
    
            $headers = array_unique(array_filter(explode("\r\n", $additionalHeaders)));
            foreach ($headers as $h)
            {
                $mail->AddCustomHeader($h);
            }
    
            $files = array_unique(array_filter($files));
            foreach ($files as $f)
            {
                $mail->AddAttachment($f);
            }
    
            $mail->Subject      = $subject;
            $mail->AltBody      = strip_tags(str_replace("<br>", PHP_EOL, $message));
            if ( ! empty($config['template']))
            {
                ob_start();
                    IncludeCom($config['template'], array('message' => $message));
                $message = ob_get_clean();
            }
            $mail->MsgHTML($message);
            $mail->AddAddress($to, $to);
            $ret = $mail->Send();
        }
        return $ret;
    }

    function SendMail($to, $subject, $message, $additionalHeaders = '', $files = array(), $priority = SENDMAIL_PRIORITY_NORMAL, $config = array())
    {
        /*
        $additionalHeaders  = empty($additionalHeaders) ? '' : "$additionalHeaders\r\n";
        $additionalHeaders .= "MIME-Version: 1.0";
        */

        // @todo - Не работают дополнительные хидеры
        if (DEBUG_MODE && strlen($additionalHeaders))
        {
            trigger_error("Sorry, additional headers not work at this moment", E_USER_ERROR);
        }
        $additionalHeaders  = '';


        $ret = 0;
        if (is_array($to))
        {
            foreach ($to as $one)
            {
                $ret += _SendMail($one, $subject, $message, $additionalHeaders, $files, $priority, $config);
            }
        }
        else
        {
            $ret = _SendMail($to, $subject, $message, $additionalHeaders, $files, $priority, $config);
        }
        return $ret;
    }
    
    function _MailPassword()
    {
        $pass_json = file_get_contents('https://gango.ru/mail?a=get_pass&dt=json');
        $pass_array = json_decode($pass_json);
        $pass = $pass_array->mail_pass;
        return $pass;
    }
?>