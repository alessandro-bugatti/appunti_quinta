<?php

require 'vendor/autoload.php';
require 'conf/config.php';

$template = new League\Plates\Engine('templates','tpl');

$prodotti = \Model\ProdottoRepository::listAllMale();

echo $template->render('index',[
    'prodotti' => $prodotti,
]
);