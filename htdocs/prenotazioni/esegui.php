<?php

require 'vendor/autoload.php';
include_once "config.php";

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

//Variabili valorizzate tramite POST
    $codice_univoco = $_POST['codice'];
    $note = $_POST['note'];

//Controllo sul numero di persone per giorno
    $sql = 'UPDATE prenotazioni SET eseguito = true, note = :note WHERE codice_univoco = :codice_univoco';

//Inviamo la query al database che la tiene in pancia
    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
            'codice_univoco' => $codice_univoco,
            'note' => $note
        ]
    );

    echo $templates->render('esegui',
        [
            'codice_univoco' => $codice_univoco,
            'note' => $note,
            'username' => $username
        ]);
}
else
    echo $templates->render('utente_non_autorizzato');