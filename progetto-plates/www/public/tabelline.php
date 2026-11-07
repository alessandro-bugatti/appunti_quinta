<?php

require '../vendor/autoload.php';

use League\Plates\Engine;

$template = new Engine('../templates', 'tpl');

echo $template->render('tabelline',
        ['titolo' => 'Elenco delle tabelline']
);

