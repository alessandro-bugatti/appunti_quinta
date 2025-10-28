# Template per la creazione di un'applicazione di tipo REST API con Slim

Questa cartella contiene il minimo indispensabile per impostare una applicazione di tipo REST API funzionante.

Nella cartella si trova:

-	la cartella ```vendor``` che deve essere presente nella ```root``` del webserver, in modo che ogni progetto possa importarla senza bisogno di scaricarla con ```composer``` tutte le volte. Supponendo che la ```root``` del server sia la cartella ```www```, la struttura dovrebbe essere:

```text
www
  |__vendor
  |__progetto1
  |     |__.htaccess
  |     |__index.php
  |     |__altro
  |__progetto2
        |__.htaccess
        |__index.php
        |__altro

```
-   il file di configurazione di **Docker**, ```docker-compose.yml```, che si deve trovare nella cartella di docker_lamp dove ci sono le altre cartelle di configurazione
- il file ```.htaccess``` che contiene le istruzioni per fare il *rewrite* verso ```index.php```
- il file ```index.php``` che istanzia l'applicazione ```Slim``` e contiene tutte le rotte implementate
- il file ```index.html```, opzionale, ma che mostra un modo per mostrare un'interfaccia di navigazione per le rotte, che altrimenti non sarebbero visibili a chi visita il sito. Questo file viene caricato e mostrato richiedendo la rotta `/`, come si può vedere in ```index.php``` 