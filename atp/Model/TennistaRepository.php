<?php

namespace Model;
use Util\Connection;

class TennistaRepository{

    public static function getTennistaById(string $id) : array{
        global $config;
        $pdo = Connection::getInstance($config);
        $stmt = $pdo->prepare('SELECT * FROM players WHERE player_id = :id');
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }
}