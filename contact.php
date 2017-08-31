<?php

$message=
    $_POST['name'].
    $_POST['tel'].
    $_POST['email'].
    $_POST['message']
;

require "phpmailer/class.phpmailer.php"; //include phpmailer class

// Instantiate Class
$mail = new PHPMailer();

// Set up SMTP
$mail->IsSMTP();                // Sets up a SMTP connection
$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
$mail->SMTPSecure = "ssl";      // Connect using a TLS connection
$mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
$mail->Port = 465;  //Gmail SMTP port
$mail->Encoding = '7bit';

// Authentication
$mail->Username   = "shabneeztest@gmail.com"; // Your full Gmail address
$mail->Password   = "webdesign!1"; // Your Gmail password

// Compose
$mail->SetFrom($_POST['email'], $_POST['name']);
$mail->AddReplyTo($_POST['email'], $_POST['name']);
$mail->Subject = "New Contact Form Enquiry";      // Subject (which isn't required)
$mail->MsgHTML($message);

// Send To
$mail->AddAddress("shabneeztest@gmail.com", "Recipient Name"); // Where to send it - Recipient
$result = $mail->Send();		// Send!
$message = $result ? "E-mail envoyé avec succès" : "Erreur d\'envoi de l\'e-mail";
unset($mail);

echo $message;

?>