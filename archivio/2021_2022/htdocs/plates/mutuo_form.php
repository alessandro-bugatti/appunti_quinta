<?php

require 'vendor/autoload.php';
use League\Plates\Engine;

// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');

$anni = array();

for ($i = 5; $i <= 50; $i += 5)
    $anni[] = $i;
//var_dump($anni);

// Render a template
echo $templates->render('mutuo_form',[
    'anni' => $anni
]);
