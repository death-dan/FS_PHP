<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

$phpmailer = new PHPMailer();
var_dump($phpmailer instanceof PHPMailer);

/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {
    $mail = new PHPMailer(true);
    // var_dump($mail);

    //CONFIG
    $mail->isSMTP();
    $mail->setLanguage("pt");
    $mail->isHTML(true);
    $mail->SMTPauth = true;
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'utf-8';

    //AUTH
    $mail->Host = "smtp.sendgrid.net";
    $mail->Username = "apikey";
    $mail->Password = "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";
    $mail->Port = "587";

    //MAIL
    $mail->setFrom("f.fernandes.r@gmail.com", "Fernando Fernandes");
    $mail->Subject = "Este é meu envio via componente no FSPHP";
    $mail->msgHTML("<h1>Hola Mundo!</h1><p>Esse é meu primeiro disparo de email.</p>");

    $mail->addAddress("f.fernandes.r@gmail.com", "Fernando");
    $send = $mail->send();
    
    var_dump($send);

} catch (MailException $exception) {
    echo message()->error($exception->getMessage());
}