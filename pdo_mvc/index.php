<?php

require 'vendor/autoload.php';
require 'conf/config.php';

$template = new League\Plates\Engine('templates','tpl');

$prodotti = \Model\ProdottoRepository::listAll();

echo $template->render('index',[
    'prodotti' => $prodotti,
]
);