	# Nome Progetto

Descrizione breve del progetto didattico.

## Requisiti

- Docker Desktop (Windows/Mac) o Docker Engine (Linux) installato
- Immagine base `didattica-php:latest` già costruita (vedi `docker-base-image/`)

## Avvio rapido

**1. Crea il file di configurazione**

Copia `.env.example` in `.env` e compilalo con nome progetto, porte e
credenziali del database, usando l'editor che preferisci.

- Windows: puoi usare Blocco Note, Notepad++ o Visual Studio Code
- Linux/Mac: qualsiasi editor di testo

**2. Avvia i container**

```bash
docker compose up -d
```

**3. Installa le dipendenze PHP (solo al primo avvio)**

```bash
docker exec <PROJECT_NAME>_web composer install
```

Sostituisci `<PROJECT_NAME>` con il valore impostato nel `.env`.

**4. Accedi all'applicazione**

- HTTP:    http://localhost:PORTA_HTTP
- HTTPS:   https://localhost:PORTA_HTTPS
- Adminer: http://localhost:PORTA_ADMINER

Le porte sono quelle impostate nel `.env`.

## Struttura

```
progetto/
├── docker-compose.yml          # Definizione dei servizi
├── docker-compose.override.yml # Servizi aggiuntivi per lo sviluppo (Adminer)
├── .env.example                # Template variabili d'ambiente
├── .env                        # Variabili locali (non committare!)
├── db-init/                    # SQL eseguiti automaticamente al primo avvio
│   ├── 01_schema.sql           # Struttura delle tabelle
│   └── 02_seed.sql             # Dati iniziali
├── db-data/
│   └── load.sh                 # Script per caricare dati aggiuntivi manualmente
├── docs/                       # Documentazione del progetto
└── www/                        # Codice PHP (montato via bind mount)
    ├── conf/                   # Configurazione non esposta da Apache
    │   └── config.php          # Configurazione applicazione (DB, env, ecc.)
    ├── public/                 # DocumentRoot Apache
    │   ├── css/
    │   ├── img/
    │   ├── js/
    │   ├── .htaccess            # Riscrittura URL per Slim
    │   └── index.php            # Front-controller dell'applicazione
    ├── src/
    │   ├── Controller/
    │   ├── Model/
    │   └── Util/
    ├── storage/                # File caricati dagli utenti (non committare)
    ├── templates/              # Template HTML (Plates)
    ├── vendor/                 # Dipendenze Composer (non committare)
    ├── composer.json
    └── ...                     # Sorgenti non direttamente esposti dal web server
```

## Comandi utili

**Fermare i container**
```bash
docker compose down
```

**Fermare e cancellare anche i dati del database**
```bash
docker compose down -v
```

**Vedere i log in tempo reale**
```bash
docker compose logs -f web
docker compose logs -f database
```

**Aprire una shell nel container web**
```bash
docker exec -it <PROJECT_NAME>_web bash
```

**Generare un hash password per un utente**
```bash
docker exec <PROJECT_NAME>_web php -r "echo password_hash('la_password', PASSWORD_DEFAULT);"
```

**Aggiornare le dipendenze Composer**
```bash
docker exec <PROJECT_NAME>_web composer update
```

## Note

- Il database viene inizializzato con gli script in `db-init/` **solo al primo avvio**
  (quando il volume `db_data` è vuoto). Per reinizializzare da zero: `docker compose down -v`
- La cartella `www/` è montata direttamente nel container: le modifiche al codice
  sono immediatamente visibili senza riavviare nulla. Apache usa `www/public/` come
  DocumentRoot, così configurazione, sorgenti, template e dipendenze restano fuori
  dalla radice pubblica.
- Se hai più progetti attivi contemporaneamente, assicurati che ogni progetto
  usi porte diverse nel file `.env`
