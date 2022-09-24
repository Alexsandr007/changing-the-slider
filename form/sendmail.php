<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = "utf-8";
    $mail->setLanguage('ru', 'PHPMailer/language');
    $mail->IsHTML(true);
    $mail->SMTPDebug = 4;
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->Port = 465;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->SMTPKeepAlive = true;

    //Данные отправителя
    $mail->Username = "linkto.agency@yandex.ru";
    $mail->Password = "DtH-G3d-E7W-p6J";
    $mail->From = "linkto.agency@yandex.ru";
    $mail->FromName = "Заявка";


    //Кому отправить
    $mail->addAddress('info@linkto.agency');
    //Тема письма
    $mail->Subject = 'Заявка';

    //Тело письма
    $body = '<h1>Данные:</h1>';

    if (trim(!empty($_POST['name']))) {
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }

    if (trim(!empty($_POST['email']))) {
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    }

    if (trim(!empty($_POST['phone']))) {
        $body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
    }

    if (trim(!empty($_POST['message']))) {
        $body.='<p><strong>Описание:</strong> '.$_POST['message'].'</p>';
    }

    $mail->Body = $body;

    $message = 'Данные отправлены';
    
    //Отправка
    $mail->send();
    $response = $message;
    echo json_encode($responce);
?>