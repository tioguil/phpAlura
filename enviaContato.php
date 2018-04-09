<?php

session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];


use src\PHPMailer;
use src\Exception;

require_once('src/Exception.php');
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');

$mail = new PHPMailer(true); 
try {
$mail->SMTPDebug = 2; 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "gmail";
$mail->Password = "123";

$mail->setFrom("@gmail.com", "Alura Curso PHP e MySQL");
$mail->addAddress("@gmail.com");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: enviaContato.php");
}


} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

die();
