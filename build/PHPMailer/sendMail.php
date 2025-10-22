<?php

    use mailerConf\PHPMailer;
    use mailerConf\SMTP;
    use mailerConf\Exception;

    require "mailerConf/Exception.php";
    require "mailerConf/PHPMailer.php";
    require "mailerConf/SMTP.php";

    $mail = new PHPMailer;

    $mail -> isSMTP();
    $mail -> Host = 'smtp-mail.outlook.com';
    $mail -> SMTPAuth = true;
    $mail -> Username = '223107472@cuautitlan.tecnm.mx';
    $mail -> Password = 'Gerardo101010__';
    $mail -> SMTPSecure = 'ssl';
    $mail -> Port = '587';

    $mail -> setForm('223107472@cuautitlan.tecnm.mx');

    $mail -> setAddress('o.galicia.0812@gmail.com');

    $mail -> Subject = 'Prueba de php mailer';

    $mail -> isHTML(true);

    $mailContent = '
    <h1> Hola, este es un correo de prueba</h1>
    <p> espero que esto si se mande</p>
    ';

    $mail -> Body = $mailContent;

    if(!$mail -> send()){
        echo 'Hubo un probelma con mandar el mensaje. Error: ' . $mail -> ErrorInfo;
    }else{
        echo 'El correo se envio exitosamente';
    }