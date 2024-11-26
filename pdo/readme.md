# Come fare il deployment del database

1. Accendere MariaDB in locale
2. Accendere DataGrip
3. Selezionare il database da esportare, tasto destro del mouse e scegliere l'opzione `Import/Export->Export with mysqldump`
4. Nella finestra che apparirà, la prima volta va selezionato il percorso dell'eseguibile *mysqldump* (Path to executable): l'eseguibile si trova nella cartella di Xampp, nelle sottocartelle `mariadb-versione\bin`
5. Nella casella di testo `Output result to` inserire la posizione (conviene la cartella di progetto) e il nome del file nel quale avverrà l'esportazione (conviene dare l'estensione .sql)
6. Dopo aver premuto il tasto Run, verrà creato il file .sql nella posizione selezionata
7. Fare il deployment di questo file nella propria home su **winnie**, nella sottocartella desiderata
8. Aprire una shell `ssh` e connettersi a **winnie** (scegliere il client che si preferisce, PHPStorm ne offre uno integrato, basta aprire il suo terminale e, utilizzando la scelta con il menù a tendina che si trova nel titolo in fianco al segno +, si aprirà una connessione con i dati del deployment)
9. Una volta entrati nel proprio profilo, spostarsi nella cartella dove si è fatto il deployment del file .sql, utilizzando il comando `cd`
10. Eseguire la seguente istruzione
    ```bash
    mariadb -h localhost -u abanio -p -Ddb_abanio < negozio.sql
    ```
    dove al posto di **abanio** si inserisce il proprio nome utente
11. Per verificare di aver eseguito tutto correttamente, ci si può connettere al proprio database, sempre utilizzando il client a riga di comando
    ```bash
     mariadb -h localhost -u abanio -p
    ```
    e apparirà un prompt tipo questo
    ```bash
    MariaDB [(none)]>
    ```
12. Provare a entrare nel proprio database con l'istruzione
    ```sql
    use nome_database;
    ```
    e verificare la presenza della tabella/e importate con il comando
    ```sql
    show tables;
    ```
13. Per verificare la struttura della tabella dare il comando
    ```sql
    describe nome_tabella;
    ```
14. Per verificare il contenuto della tabella dare il comando
    ```sql
    SELECT * FROM nome_tabella;
    ```
15. Per chiudere la connessione al database dare il comando
    ```sql
    quit
    ```