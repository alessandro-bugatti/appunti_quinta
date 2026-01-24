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

    public static function getInstance($path): PDO
    {
        //Include il file con i parametri di connessione
        require_once '..' . $path .'/conf/config.php';

        if (!isset($pdo)) {
            $DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            $pdo = new PDO($DSN, DB_USER, DB_PASS);
        }
        return $pdo;
    }
}

