<?php
    require 'vendor/autoload.php';

    $template = new League\Plates\Engine('templates', 'tpl');

    $result = \Model\StudenteRepository::listAll();

    echo $template->render('index', [
        'studenti'=>$result
    ]);


