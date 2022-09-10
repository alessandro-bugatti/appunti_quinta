<?php
require 'vendor/autoload.php';
use League\Plates\Engine;

// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');

$stringa1 = $_POST['stringa1'];
$stringa2 = $_POST['stringa2'];
$hamming = 0;
for ($i = 0; $i < strlen($stringa1); $i++) {
    if ($stringa1[$i] != $stringa2[$i])
        $hamming++;
}

// Render a template
echo $templates->render('hamming', ['hamming' => $hamming]);

