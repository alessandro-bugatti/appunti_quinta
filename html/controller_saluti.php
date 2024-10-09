<?php

require 'vendor/autoload.php';

$templates = new League\Plates\Engine('templates','tpl');

if (isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $saluto = 'Ciao ' . $nome . ' ' . $cognome;
}
else{
    $saluto = '';
}

echo $templates->render('saluti',
[
    'benvenuto' => $saluto,
]);