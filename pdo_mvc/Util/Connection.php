<?php

namespace Util;
use PDO;


//Classe Singleton che serve per gestire la collezione
class Connection{
    //Variabile che conterrà l'unico oggetto PDO gestito
    //da questa classe
    private static $pdo;

    private function __construct(){}

    public static function getInstance(){
        //Se la connessione non è già presente, istanziala
        if (!isset(Connection::$pdo)) {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
            Connection::$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
        }
        return Connection::$pdo;
    }
}