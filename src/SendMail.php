<?php
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $company = $_POST['company'];
    $messagee = $_POST['message'];
    
    $message = "";
    $message .= "Имя: " . $first_name . "<br />";
    $message .= "Фамилия: " . $second_name . "<br />";
    $message .= "Почта: " . $email . "<br />";
    $message .= "Заголовок: " . $title . "<br />";
    $message .= "Компания: " . $company . "<br />";
    $message .= "Сообщение: " . $messagee . "<br />";
    SendMail('vlad@podvoysky.com', 'Сообщение из формы обратной связи', $message);
    die('ok');
?>
