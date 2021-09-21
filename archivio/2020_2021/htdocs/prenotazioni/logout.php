<?php

require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//distrugge il file con le informazioni di sessione
session_destroy();
//distrugge eventuali informazioni in memoria RAM
$_SESSION = array();

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

echo $templates->render('logout');



