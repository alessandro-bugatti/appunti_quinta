<?php
require 'vendor/autoload.php';
require_once 'conf/config.php';

$template = new League\Plates\Engine('templates', 'tpl');

    if (isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        \Model\StudenteRepository::add($nome, $cognome);
    }

    $result = \Model\StudenteRepository::listAll();

    echo $template->render('insert', [
    'studenti'=>$result
]);


