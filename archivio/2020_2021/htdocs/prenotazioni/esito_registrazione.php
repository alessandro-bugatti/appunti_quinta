<?php

require 'vendor/autoload.php';
include_once "config.php";

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

if (isset($_SESSION['username'])) {
    $creator_username = $_SESSION['username'];
    //Variabili valorizzate tramite POST
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //Controllo sull'univocità dello username
    $sql = "SELECT * FROM utenti WHERE username = :username";

    //Inviamo la query al database che la tiene in pancia
    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
            'username' => $username
        ]
    );

    $riga = $stmt->fetch();

    if ($riga !== false) {
        echo $templates->render('username_non_disponibile', ['username' => $username]);
    } else if ($password != $password2) {
        echo $templates->render('password_diverse');
    } else {
        //Query di inserimento preparata
        $sql = 'INSERT INTO utenti (username, password) 
                VALUES(:username, :password)';

        //Inviamo la query al database che la tiene in pancia
        $stmt = $pdo->prepare($sql);

        //Inviamo i dati concreti che verranno messi al posto dei segnaposto
        $stmt->execute(
            [
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]
        );

        echo $templates->render('registrazione_effettuata', [
            'username' => $username,
            'creatore_username' => $creator_username
            ]);
    }
}
    else
        echo $templates->render('utente_non_autorizzato');



