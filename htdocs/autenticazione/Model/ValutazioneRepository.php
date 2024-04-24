<?php

namespace Model;
use Util\Connection;

class ValutazioneRepository{

    public static function getValutazioniStudente(int $id):array{
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM valutazione WHERE id_studente=:id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                'id' => $id
            ]
        );

        $rows = $stmt->fetchAll();
        return $rows;
    }

}