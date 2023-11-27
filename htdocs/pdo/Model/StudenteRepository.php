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

    public static function listAllOrderBySurname(): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti ORDER BY Cognome';
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }

    public static function listAllOrderByName(): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti ORDER BY Nome';
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }
    public static function listAllOrderByClass(): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti ORDER BY Classe';
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }
}