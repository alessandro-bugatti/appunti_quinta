<?php

namespace Util;                                             // Declare namespace

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    protected $phpmailer;                                            // PHPMailer object

    public function __construct($email_config)
    {
        $this->phpmailer = new PHPMailer(true); // Create PHPMailer
        $this->phpmailer->isSMTP();                                  // Use SMTP
        $this->phpmailer->SMTPAuth   = true;                         // Authentication on
        $this->phpmailer->Host       = $email_config['server'];      // Server address
        $this->phpmailer->SMTPSecure = $email_config['security'];    // Type of security
        $this->phpmailer->Port       = $email_config['port'];        // Port
        $this->phpmailer->Username   = $email_config['username'];    // Username
        $this->phpmailer->Password   = $email_config['password'];    // Password
        $this->phpmailer->SMTPDebug  = $email_config['debug'];       // Debug method
        $this->phpmailer->CharSet    = 'UTF-8';                      // Character encoding
        $this->phpmailer->isHTML(true);                              // Set as HTML email
    }

    public function sendEmail($to, $subject, $message): bool
    {
        $this->phpmailer->setFrom($this->phpmailer->Username);                            // From email address
        $this->phpmailer->addAddress($to);                           // To email address
        $this->phpmailer->Subject = $subject;                        // Subject of email
        $this->phpmailer->Body    = '<!DOCTYPE html><html lang="it-IT"><body>'
            . $message .'</body></html>';                            // Body of email
        $this->phpmailer->AltBody = strip_tags($message);            // Plain text body
        if ($this->phpmailer->send())                                // Send the email
            return true;
        return false;
    }
}
