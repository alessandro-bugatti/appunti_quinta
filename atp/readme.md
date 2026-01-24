# Gestione della connessione a database con una classe Singleton

**Problema che si vuole risolvere**: gestire l'apertura della connessione a database in un unico 
posto. Inoltre fare in modo che se vengono fatte più query, la connessione sia comunque unica.

## Creazione della classe Connection

Questa classe avrà la responsabilità di aprire la connessione al DB e garantirne il riutilizzo.
Per far questo utilizzeremo il pattern Singleton.

1. Creazione del file php che contiene la classe `Connection` (vedere il codice per la documentazione)
2. 