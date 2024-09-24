<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

define('DEV', true);  // In development or live? Development = true | Live = false

// SMTP server settings - ENTER YOUR DETAILS HERE
$email_config = [
    'server'      => '',
    'port'        => '',
    'username'    => '',
    'password'    => '',
    'security'    => PHPMailer::ENCRYPTION_SMTPS,
    'admin_email' => '',
    'debug'       => (DEV) ? SMTP::DEBUG_SERVER : SMTP::DEBUG_OFF,
];
