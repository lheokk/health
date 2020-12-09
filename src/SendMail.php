<?php
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $company = $_POST['company'];
    $message = $_POST['message'];
    
    $message = "";
    $message .= "Имя: " . $first_name . "<br />";
    $message .= "Фамилия: " . $second_name . "<br />";
    $message .= "Почта: " . $email . "<br />";
    $message .= "Заголовок: " . $title . "<br />";
    $message .= "Компания: " . $company . "<br />";
    $message .= "Сообщение: " . $message . "<br />";
    
    SendMail('anovicebko74@yandex.ru', 'Сообщение из формы обратной связи', $message);
?>
