<?php

require '../vendor/autoload.php';

use League\Plates\Engine;

$template = new Engine('../templates', 'tpl');

$numero = $_GET['numero'] ?? 1;

echo $template->render('tabellina',
        [
            'numero' => $numero,
            'titolo' => 'Tabellina del ' . $numero,
        ]
);