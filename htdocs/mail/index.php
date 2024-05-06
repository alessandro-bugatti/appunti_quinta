<?php
/**
 * @var $email_config
 */
require_once 'vendor/autoload.php';
require_once 'conf/config.php';

use League\Plates\Engine;
use PHPMailer\PHPMailer\PHPMailer;
use Util\Email;

$template = new Engine('templates','tpl');

$sent = null;

if (isset($_POST['to'])){
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $mail = new Email($email_config);

    try {
        $sent = $mail->sendEmail($to, $subject, $message);
    } catch (Exception $e) {
        $sent = false;
    }
}

echo $template->render('sendmail', [
    'sent' => $sent
]);