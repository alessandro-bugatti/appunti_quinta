<?php

namespace Util;
use PDO;

require_once '../conf/config.php';
/**
 * Classe per gestire la connessione al database
 */

class Connection
{

    private static PDO $pdo;

    /**
     * Costruttore privato per evitare la creazione di oggetti
     */
    private function __construct()
    {

    }

    public static function getInstance(): PDO
    {
        if (!isset($pdo)) {
            $DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR;
            $pdo = new PDO($DSN, DB_USER, DB_PASSWORD);
        }
        return $pdo;
    }
}

