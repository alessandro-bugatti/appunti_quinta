<?php

require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');



//Se sei una persona che ha fatto il login
if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];

    //Query per recuperare tutte le prenotazioni
    $sql = "SELECT * FROM prenotazioni";

    //Invio la query al server MySQL
    $stmt = $pdo->query($sql);

    //Estraggo le righe di risposta che finiranno come vettori in $result
    $result = $stmt->fetchAll();

    //Rendo un template che mi visualizza la tabella
    echo $templates->render('lista_prenotazioni',
        [
            'result' => $result,
            'username' => $username
        ]

    );
}
else
    echo $templates->render('utente_non_autorizzato');