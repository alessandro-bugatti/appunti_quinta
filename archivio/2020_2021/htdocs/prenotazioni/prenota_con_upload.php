<?php

require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

//Rendo un template che mi visualizza la tabella
echo $templates->render('prenotazione_con_upload');