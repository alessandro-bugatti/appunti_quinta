#!/bin/bash

# Carica dati aggiuntivi nel database (opzionale).
# Eseguilo manualmente dopo l'avvio dei container se hai dati extra
# da importare oltre agli script in db-init/.
#
# Uso: ./db-data/load.sh

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
ENV_FILE="$SCRIPT_DIR/../.env"

if [ ! -f "$ENV_FILE" ]; then
    echo "Errore: file .env non trovato in $ENV_FILE"
    exit 1
fi

export $(grep -v '^#' "$ENV_FILE" | xargs)

DB_CONTAINER="${PROJECT_NAME}_db"

echo "Container DB: $DB_CONTAINER"
echo "Caricamento dati aggiuntivi..."

# Aggiungi qui i file SQL da caricare, in ordine:
# for file in "$SCRIPT_DIR/01-dati.sql" \
#             "$SCRIPT_DIR/02-altri-dati.sql"
# do
#     echo "-> $file"
#     docker exec -i "$DB_CONTAINER" mariadb -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" < "$file"
# done

echo "Nessun file configurato. Aggiungi i tuoi file SQL nello script."
