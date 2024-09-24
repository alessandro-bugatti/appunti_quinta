<?php
require 'vendor/autoload.php';

function produci_codice():string
{
    $codice = '';
    for ($i = 0; $i < 18; $i++) {
        $codice .= rand()%10;
    }
    return $codice;
}

$tipi = [
    1 => 1,
    2 => 1.5,
    3 => 2
];

$nome_tipi = [
    1 => 'Biglietto singolo',
    2 => 'Biglietto orario',
    3 => 'Biglietto giornaliero'
];

$zone = [
    1 => 1.4,
    2 => 1.8,
    3 => 2.2
];


$templates = new League\Plates\Engine('templates','tpl');




if (isset($_POST['nominativo']))
{
    $nominativo = $_POST['nominativo'];
    $quanti = $_POST['quanti'];
    $zona = $_POST['zona'];
    $tipo = $_POST['tipo'];
    $costo_biglietto = $zone[$zona] * $tipi[$tipo];
    $costo_totale = $costo_biglietto * $quanti;
    $tipo_biglietto = $nome_tipi[$tipo];
    $tickets = array();
    for ($i = 0; $i < $quanti; $i++){
        $ticket['nominativo'] = $nominativo;
        $ticket['codice'] = produci_codice();
        $ticket['zona'] = $zona;
        $ticket['tipo'] = $tipo_biglietto;
        $ticket['costo'] = $costo_biglietto;
        $tickets[] = $ticket;
    }
    echo $templates->render('print_tickets',[
            'tickets' => $tickets,
            'costo_totale' => $costo_totale
        ]);
}
else
    echo $templates->render('bus_ticket');

