CREATE TABLE menu(
    id int unsigned auto_increment primary key not null,
    nome varchar(100) not null,
    costo float not null,
    personalizzato bool not null
);

CREATE TABLE categoria(
    id int unsigned auto_increment primary key not null,
    descrizione varchar(255) not null
)

CREATE TABLE piatto
(
    id               int unsigned auto_increment primary key not null,
    nome             varchar(100),
    costo            float,
    elenco_allergeni text,
    id_categoria     int unsigned
)

DROP TABLE piatto;

CREATE TABLE piatto
(
    id               int unsigned auto_increment primary key not null,
    nome             varchar(100),
    costo            float,
    elenco_allergeni text,
    id_categoria     int unsigned,
    FOREIGN KEY (id_categoria) REFERENCES categoria(id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
)

CREATE TABLE menu_piatto(
    id int unsigned auto_increment primary key not null,
    id_piatto int unsigned not null,
    id_menu int unsigned not null,
    FOREIGN KEY (id_piatto) REFERENCES piatto(id)
                        ON DELETE cascade
                        ON UPDATE cascade,
    FOREIGN KEY (id_menu) REFERENCES menu(id)
                        ON DELETE RESTRICT
                        ON UPDATE RESTRICT

)

# Istruzione per l'inserimento di nuove righe (la C  di CRUD)
INSERT INTO piatto
(nome, costo, id_categoria)
VALUES ( "Manzo all'olio", 22, 1);

INSERT INTO piatto
VALUES(null, "Frittelle", 7, "Nessuno", 4);

# Istruzione per la cancellazione di una o più righe (la D di CRUD)
DELETE
FROM piatto
WHERE id = 2;

# Istruzione per la modifica di dati già presenti (la U di CRUD)
UPDATE piatto
SET nome = "Tagliatelle al ragù", costo = costo * 0.9, elenco_allergeni = "Pomodoro"
WHERE id = 1;

#Gestione delle date nel formato corretto
#Aggiorna tutte le righe per mettere la data di creazione a oggi
UPDATE menu
SET data_creazione = "2025-01-25";

#Cosa succede se il formato è sbagliato o la data non è valida?
UPDATE menu
SET data_creazione = "2025-01-32"
WHERE id = 1;

#Si possono usare anche delle funzioni per operare sulle date
UPDATE menu
SET data_creazione = ADDDATE(data_creazione, 7)
WHERE id = 1;