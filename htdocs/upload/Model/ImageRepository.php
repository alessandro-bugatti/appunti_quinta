<?php

namespace Model;
use Util\Connection;

class ImageRepository{

    /**
     * Inserisce il nome dell'immagine nel database
     * @param string $name Nome dell'immagine
     * @return bool true se l'inserimento è riuscito, false altrimenti
     */
    public static function addImage(string $name): bool{
        $pdo = Connection::getInstance();
        $sql = 'INSERT INTO image (name) VALUES (:name)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
                'name' => $name
            ]
        );
        //L'inserimento nel DB è fallito
        if($stmt->rowCount() == 0)
            return false;
        return true;
    }

    /**
     * Ritorna l'elenco dell immagini inserite nel DB
     * @return array elenco delle immagini
     */
    public static function listAll(): array{
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM image ORDER BY id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}