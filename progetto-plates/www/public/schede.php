<?php

require '../vendor/autoload.php';

use League\Plates\Engine;
use Model\PeopleRepository;

$template = new Engine('../templates', 'tpl');

$persone = PeopleRepository::getPeople();

echo $template->render('schede',
    [
        'titolo' => 'Informatici famosi',
        'persone' => $persone,
    ]
);

