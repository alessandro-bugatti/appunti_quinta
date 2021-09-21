<?php

require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo $templates->render('registrazione', [
        'username' => $username
    ]);
}
else
    echo $templates->render('utente_non_autorizzato');



