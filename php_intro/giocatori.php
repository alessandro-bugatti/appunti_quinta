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

header('Content-type: application/json');
echo json_encode($squadra);