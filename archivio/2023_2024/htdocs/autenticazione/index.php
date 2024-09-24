<?php

require_once 'vendor/autoload.php';
require_once 'conf/config.php';

use League\Plates\Engine;
use Util\Authenticator;

$template = new Engine('templates','tpl');
//Fa partire il processo di autenticazione
$user = Authenticator::getUser();

if ($user == null){
    echo $template->render('login');
    exit(0);
}

$displayed_name = $user['nome'] . ' ' . $user['cognome'];

if (isset($_GET['action'])){
    if (($_GET['action']) == 'logout'){
        Authenticator::logout();
        echo $template->render('login');
        exit(0);
    }
    if (($_GET['action']) == 'valutazioni'){
        $valutazioni = \Model\ValutazioneRepository::getValutazioniStudente($user['id']);
        echo $template->render('valutazioni', [
            'valutazioni' => $valutazioni,
            'displayed_name' => $displayed_name
        ]);
        exit(0);
    }
}

echo $template->render('mypage', [
    'displayed_name' => $displayed_name
]);