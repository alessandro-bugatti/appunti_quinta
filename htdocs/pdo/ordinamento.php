<?php
    require 'vendor/autoload.php';
    require_once 'conf/config.php';

    $template = new League\Plates\Engine('templates', 'tpl');

    $ordina = 'cognome';
    if (isset($_GET['ordina'])){
        $ordina = $_GET['ordina'];
    }
    if ($ordina == 'cognome')
        $result = \Model\StudenteRepository::listAllOrderBySurname();
    else if ($ordina == 'nome')
        $result = \Model\StudenteRepository::listAllOrderByName();
    else
        $result = \Model\StudenteRepository::listAllOrderByClass();

    echo $template->render('ordinamento', [
        'studenti'=>$result
    ]);


