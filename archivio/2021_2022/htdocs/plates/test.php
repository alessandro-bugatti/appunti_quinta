<?php

require 'vendor/autoload.php';
use League\Plates\Engine;

// Create new Plates instance
$templates = new League\Plates\Engine('templates','phtml');

$name = $_GET['name'];

$name = '***' . $name . '***';

// Render a template
echo $templates->render('profile', ['name' => $name]);

