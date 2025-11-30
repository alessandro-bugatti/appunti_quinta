# Istruzioni per la creazione di un progetto con DB

1. Far partire Docker nell'unica cartella testata che si sa che funziona
2. Aprire un nuovo progetto PHPStorm nella cartella dove ci sono i progetti, non dove ci sono i file di Docker
3. Connettersi al DB tramite PHPStorm, che ha integrate le stesse funzionalità di DataGrip, utilizzando l'icona DB nella barra di destra. 
   1. Scegliere come Data Source -> MariaDB
   2. Impostare i parametri nella finestra di dialogo, scaricando i driver se servono
   3. Utilizzare l'utente corretto, root se si vogliono ad esempio creare nuovi database
   4. Testare la connessione e salvare con OK
4. Se serve, creare un database con l'istruzione
    ```sql
    CREATE DATABASE nome_db;
    ```
tramite la console che si apre nell'editor
5. Impostare la console al database che si intende utilizzare tramite il menù a tendina in alto a destra.
6. Dare le istruzioni che consentono di creare le tabelle ed eventualmente popolarle, oppure importare il DB di interesse.
7. Ha senso esportare il database per tenerne una copia versionabile