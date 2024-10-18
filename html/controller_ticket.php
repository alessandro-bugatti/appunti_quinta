<?php

require 'vendor/autoload.php';

$templates = new League\Plates\Engine('templates','tpl');


function generaCifreCasuali($lunghezza)
{
    $cifreCasuali = '';
    for ($i = 0; $i < $lunghezza; $i++) {
        $cifreCasuali .= rand(0, 9); // Genera un numero casuale tra 0 e 9
    }
    return $cifreCasuali;
}

$codici = [];
$nominativo = '';
$nominativi = [
    'Alessandro',
    'Cristina',
    'Daniele',
    'Chiara',
    'Andrea'
];
$biglietti = [];

if (isset($_POST['nominativo'])) {
    $nominativo = $_POST['nominativo'];
    $n_biglietti = $_POST['n_biglietti'];

    for ($i = 0; $i < $n_biglietti; $i++) {
        $codici[] = generaCifreCasuali(18);
    }

    $biglietti = [];
    for ($i = 0; $i < $n_biglietti; $i++) {
        $biglietti[] = [
            'nominativo' => $nominativi[$i],
            'codice' => $codici[$i]];
    }
}



echo $templates->render('ticket',
    [
        'codici' => $codici,
        'nominativo' => $nominativo,
        'biglietti' => $biglietti
    ]
);