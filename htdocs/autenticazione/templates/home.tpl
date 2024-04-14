<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $titolo
 */
?>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <title><?=$this->e($titolo)?></title>
</head>
<body>
<div class="container grid-lg">
<!--Questa parte sarà sempre così e serve a includere
il template che contiene il contenuto vero e proprio-->
<?=$this->section('content')?>
</div>
</body>
</html>
