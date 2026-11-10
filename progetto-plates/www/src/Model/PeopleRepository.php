<?php

namespace Model;

class PeopleRepository
{
    static function getPeople() : array
    {
        return [
            '1' => [
                'nome' => 'Alan',
                'cognome' => 'Turing',
                'nazionalita' => 'Inglese',
                'anno_nascita' => 1912,
                'immagine' => 'alan-turing.jpg',
                'descrizione-immagine' => 'Foto di Alan Turing quando era al King\'s College',
            ],
            '2' => [
                'nome' => 'Ada',
                'cognome' => 'Lovelace',
                'nazionalita' => 'Inglese',
                'anno_nascita' => 1815,
            ],
            '3' => [
                'nome' => 'Grace',
                'cognome' => 'Hopper',
                'nazionalita' => 'Americana',
                'anno_nascita' => 1906,
            ],
        ];

    }

    static function getPeopleByID(int $id) : array
    {
        $persone = self::getPeople();
        return $persone[$id];
    }
}