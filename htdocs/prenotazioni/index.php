<?php

require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

echo $templates->render('prenotazione', []);



