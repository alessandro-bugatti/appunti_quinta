<?php


//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require './vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number:
// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'ottoneerminio31@gmail.com';

//Password to use for SMTP authentication
//Si veda questo link per predisporre l'indirizzo gmail
//in modo che possa essere usato per inviare mail
//da un'applicazione PHP
//https://stackoverflow.com/questions/76186516/im-trying-to-make-phpmailer-work-but-it-keeps-giving-me-the-smtp-error-could-n
$mail->Password = 'xxxxxxxxxxxxxxxx';

//Set who the message is to be sent from
$mail->setFrom('ottoneerminio31@gmail.com', 'Ottone Erminio');

//Set an alternative reply-to address
//This is a good place to put user-submitted addresses
$mail->addReplyTo('ottoneerminio31@gmail.com', 'Ottone Erminio');

//Set who the message is to be sent to
$mail->addAddress('balbiani.gabriele@gmail.com', 'Balbiani Gabriele');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

$mail->Body = 'Questa è una prova';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';

}

