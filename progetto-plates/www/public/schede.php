<?php

require '../vendor/autoload.php';

use League\Plates\Engine;

$template = new Engine('../templates', 'tpl');

$persone = [
    'Mario',
    'Anna',
    'Giulia',
];

echo $template->render('schede',
    [
        'titolo' => 'Pietre d\'inciampo',
        'persone' => $persone,
    ]
);

