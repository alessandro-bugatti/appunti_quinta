<?php

namespace Model;

use Util\Connection;

class ProdottoRepository{

    public static function listAll(){
        $pdo = Connection::getInstance();
        $risposta = $pdo->query("SELECT * FROM prodotto");
        return $risposta->fetchAll();
    }

    public static function listAllMale(){
        $pdo = Connection::getInstance();
        $risposta = $pdo->query('SELECT * FROM prodotto WHERE genere = "Uomo"');
        return $risposta->fetchAll();
    }

    public static function listAllFemale(){
        $pdo = Connection::getInstance();
        $risposta = $pdo->query('SELECT * FROM prodotto WHERE genere = "Donna"');
        return $risposta->fetchAll();
    }

    public static function listByCategory($category){
        $pdo = Connection::getInstance();
        $risposta = $pdo->prepare('SELECT * FROM prodotto WHERE categoria = :category');
        $risposta->execute([
            'category' => $category]
        );
        return $risposta->fetchAll();
    }

    public static function aggiungiProdotto(array $data){
        $pdo = Connection::getInstance();
        $risposta = $pdo->prepare('INSERT INTO prodotto (nome, descrizione, prezzo, genere) VALUES (:nome, :descrizione, :prezzo, :genere)');
        $risposta->execute([
           'nome' => $data['nome'],
            'descrizione' => $data['descrizione'],
            'prezzo' => $data['prezzo'],
            'genere' => $data['genere']
        ]);
    }
}