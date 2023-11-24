<?php

namespace Model;
use Util\Connection;

class StudenteRepository
{
    public static function listAll(): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti';
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }
}