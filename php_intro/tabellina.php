<?php

$numero = $_GET['numero'];

for ($i = 1; $i <= 10; $i++) {
    $risultato = $numero * $i;
    echo $risultato . "\n";
}