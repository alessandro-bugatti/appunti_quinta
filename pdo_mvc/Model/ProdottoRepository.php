<?php

namespace Model;

use Util\Connection;

class ProdottoRepository{

    public static function listAll(){
        $pdo = Connection::getInstance();
        $risposta = $pdo->query("SELECT * FROM prodotto");
        return $risposta->fetchAll();
    }

    public static function listAllMale(){
        $pdo = Connection::getInstance();
        $risposta = $pdo->query('SELECT * FROM prodotto WHERE genere = "maschio"');
        return $risposta->fetchAll();
    }
}