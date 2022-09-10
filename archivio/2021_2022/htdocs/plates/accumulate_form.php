<?php

require 'vendor/autoload.php';
use League\Plates\Engine;

// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');

// Render a template
echo $templates->render('accumulate_form');
