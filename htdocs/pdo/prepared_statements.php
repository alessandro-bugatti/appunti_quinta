<?php
require 'vendor/autoload.php';
require_once 'conf/config.php';

$template = new League\Plates\Engine('templates', 'tpl');

$id = 0;
if (isset($_GET['id'])){
    $id = $_GET['id'];
}

    $result = \Model\StudenteRepository::listAllUsingId($id);

    echo $template->render('index', [
    'studenti'=>$result
]);


