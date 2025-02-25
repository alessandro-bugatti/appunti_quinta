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

    public static function cancellaProdotto(int $id){
        $pdo = Connection::getInstance();
        $risposta = $pdo->prepare('DELETE FROM prodotto WHERE id = :id');
        $risposta->execute([
            'id' => $id,
        ]);
    }

    public static function getProdottoByID(int $id)
    {
        $pdo = Connection::getInstance();
        $risposta = $pdo->prepare('SELECT * FROM prodotto WHERE id = :id');
        $risposta->execute([
            'id' => $id
        ]);
        return $risposta->fetch();
    }

    public static function aggiornaProdotto(array $data, int $id){
        $pdo = Connection::getInstance();
        $risposta = $pdo->prepare('UPDATE prodotto SET nome = :nome, descrizione = :descrizione, prezzo = :prezzo, genere = :genere WHERE id = :id');
        $risposta->execute([
            'nome' => $data['nome'],
            'descrizione' => $data['descrizione'],
            'prezzo' => $data['prezzo'],
            'genere' => $data['genere'],
            'id' => $id
        ]);
    }
}
