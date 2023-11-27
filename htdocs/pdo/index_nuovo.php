<?php
    require 'vendor/autoload.php';
    require_once 'conf/config.php';

    $template = new League\Plates\Engine('templates', 'tpl');

    $result = \Model\StudenteRepository::listAll();

    echo $template->render('index', [
        'studenti'=>$result
    ]);


