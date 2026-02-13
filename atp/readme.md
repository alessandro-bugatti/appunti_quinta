# Gestione della connessione a database con una classe Singleton

**Problema che si vuole risolvere**: gestire l'apertura della connessione a database in un unico 
posto. Inoltre fare in modo che se vengono fatte più query, la connessione sia comunque unica.

## Creazione della classe Connection

Questa classe avrà la responsabilità di aprire la connessione al DB e garantirne il riutilizzo.
Per far questo utilizzeremo il pattern Singleton.

1. Creazione del file php che contiene la classe `Connection` (vedere il codice per la documentazione)
2. Modifica del file `config.php` per fare in modo da poter passare facilmente le informazioni sulla connessione al database al metodo `getInstance` di `Connection`
3. Il metodo `getInstance` è un metodo statico che ritorna la connessione al database, creandola, se viene chiamato la prima volta, o restituendo quella già creata nel caso venga chiamato altre volte nello stesso script
4. La classe `Connection` si trova nel namespace `Util`, che viene posto nella cartella radice del server, `www`, e viene messo in *autoloading* aggiungendolo al file `composer.json`. Questa scelta è obbligata per poter utilizzare questa classe anche in progetti successivi, anche se è un po' contorta. Il file di `composer.json` avrà quindi questo contenuto:
```json
{
    "require": {
        "league/plates": "^3.6",
        "slim/slim": "4.*",
        "slim/psr7": "^1.8"
    },
  "autoload": {
    "psr-4": {
      "Util\\": "Util/"
    }
  }
}
```

Nel codice che dovrà gestire le varie chiamate al database la connessione verrà istanziata tramite una chiamata come questa:
```php
global $config;
$pdo = Connection::getInstance($config);
```

La variabile globale `$config` verrà creata all'inizio del front-controller.

## Come aggiungere il container

Aggiungere nel file `composer.json` la riga
```json
"php-di/slim-bridge" : "*"
```
in modo che il file diventi

```json
{
    "require": {
        "league/plates": "^3.6",
        "slim/slim": "4.*",
        "slim/psr7": "^1.8",
        "php-di/slim-bridge": "*"
    },
  "autoload": {
    "psr-4": {
      "Util\\": "Util/"
    }
  }
}
```

e poi eseguire il comando
```shell
docker-compose run --rm composer update
```