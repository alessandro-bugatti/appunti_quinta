<?php

$squadra = [
    "nome" => "AC Bluestar",
    "giocatori" => [
        [
            "nome" => "Luca Rossi",
            "numero" => 10,
            "ruolo" => "Attaccante",
            "nazionalità" => "Italiana"
        ],
        [
            "nome" => "Marco Bianchi",
            "numero" => 8,
            "ruolo" => "Centrocampista",
            "nazionalità" => "Italiana"
        ],
        [
            "nome" => "David Moreira",
            "numero" => 5,
            "ruolo" => "Difensore",
            "nazionalità" => "Portoghese"
        ],
        [
            "nome" => "Tomás Novak",
            "numero" => 1,
            "ruolo" => "Portiere",
            "nazionalità" => "Ceca"
        ]
    ]
];

$giocatori = $squadra['giocatori'];


header('Content-type: application/json');

if(isset($_GET['numero'])){
    $numero = $_GET['numero'];
    if(array_key_exists($numero, $giocatori)){
        echo json_encode($giocatori[$numero]);
    }
    else{
        echo json_encode(['errore' => 'giocatore non presente']);
    }
}
else{
    echo json_encode($giocatori);
}



