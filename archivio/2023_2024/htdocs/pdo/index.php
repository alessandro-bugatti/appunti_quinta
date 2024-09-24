<?php
require 'vendor/autoload.php';
require_once 'conf/config.php';

$template = new League\Plates\Engine('templates', 'tpl');
$studente['Nome'] = '';
$studente['Cognome'] = '';
if(isset($_GET['action'])){
    if ($_GET['action'] == 'delete'){
        $id = $_GET['id'];
        \Model\StudenteRepository::remove($id);
    }
    if ($_GET['action'] == 'update'){
        $id = $_GET['id'];
        $studente = \Model\StudenteRepository::getStudenteByID($id);
    }
}


    if (isset($_POST['nome'])){
        //modifica

        if (isset($_POST['id'])){

            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            \Model\StudenteRepository::update($nome, $cognome, $id);
        }
        //inserimento
        else{
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            \Model\StudenteRepository::add($nome, $cognome);
        }

    }

    $result = \Model\StudenteRepository::listAll();

    echo $template->render('index', [
        'studenti'=>$result,
        'studente'=>$studente
]);


