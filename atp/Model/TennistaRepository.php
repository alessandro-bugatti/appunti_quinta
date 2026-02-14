<?php

namespace Model;
use Util\Connection;

class TennistaRepository{

    private $config;

    public function __construct($config){
        $this->config = $config;
    }

    public function getTennistaById(string $id) : array{
        $pdo = Connection::getInstance($this->config);
        $stmt = $pdo->prepare('SELECT * FROM players WHERE player_id = :id');
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }
}