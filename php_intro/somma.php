<?php

//$_GET è una supervariabile globale gestita automaticamente dall'interprete e riempita con i dati GET eventualmente presenti

//Viene assegnato un parametro presente nella richiesta GET e che si chiama primo
$primo = $_GET['primo'];
//Viene assegnato un parametro presente nella richiesta GET e che si chiama secondo
$secondo = $_GET['secondo'];

$somma = $primo + $secondo;

echo $somma;