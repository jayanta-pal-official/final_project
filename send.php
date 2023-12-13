<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if (isset($_POST["submit"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jayantapal9735@gmail.com'; // mail id
    $mail->Password = ''; //gmail app password 
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('jayantapal9735@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['massage'];
    $mail->send();
    echo "<script>alert('mail send succesfully')
    document.location='contact.php'
    </script>";
}
