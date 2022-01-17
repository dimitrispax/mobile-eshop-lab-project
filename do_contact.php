<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__. '/vendor/autoload.php';

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $message =  $name . " " . $surname . "with email: " . $email . ", " . " sends you the following message: " . $message;

    $mail = new PHPMailer(true);
    //SMTP Config
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'diepafi123@gmail.com';
    $mail->Password = 'D!$p@f!123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    //Recepients
    $mail->setFrom($email);
    $mail->addAddress('diepafi123@gmail.com');
    $mail->addReplyTo('diepafi123@gmail.com');
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Pax & Krem | Mail Activation';
    $mail->Body = $message;
    $mail->send();
    header('Location: contact.php');




?>