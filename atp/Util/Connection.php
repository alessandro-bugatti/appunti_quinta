<?php

//Il namespace deve essere uguale alla cartella che contiene il file
namespace Util;
use PDO;


/**
 * Classe per gestire la connessione al database
 */

class Connection
{
    //Statico perchè è un attributo di classe istanziato una sola volta
    private static PDO $pdo;

    /**
     * Costruttore privato per evitare la creazione di oggetti
     */
    private function __construct()
    {

    }

    public static function getInstance($config): PDO
    {
        if (!isset($pdo)) {
            $DSN = 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'];
            $pdo = new PDO($DSN, $config['DB_USER'], $config['DB_PASS']);
        }
        return $pdo;
    }
}

