CREATE INDEX index_cognome ON tennista(cognome);

ALTER TABLE tennista
ADD COLUMN guadagni_totali FLOAT;

ALTER TABLE tennista
MODIFY COLUMN cognome VARCHAR(100);

ALTER TABLE tennista
CHANGE COLUMN data_nascita data_pro DATE;

ALTER TABLE tennista
DROP COLUMN guadagni_totali;

ALTER TABLE tennista
ADD COLUMN id_societa int unsigned NOT NULL;

CREATE TABLE societa(
    id INT UNSIGNED AUTO_INCREMENT primary key,
    nome varchar(50) NOT NULL
);

ALTER TABLE tennista
ADD CONSTRAINT fk_societa
FOREIGN KEY (id_societa)
REFERENCES societa(id);

ALTER TABLE tennista
DROP FOREIGN KEY fk_societa;

ALTER TABLE tennista
RENAME TO giocatore;

DROP TABLE giocatore;

CREATE USER manager_torneo@localhost
IDENTIFIED BY "manager";

GRANT ALL PRIVILEGES ON tennis.*
TO manager_torneo@localhost;

ALTER USER manager_torneo@localhost
IDENTIFIED BY "torneo";

DROP USER manager_torneo@localhost;

-- Istruzioni DML

INSERT INTO societa (id, nome) VALUES (null, "Brixia");

INSERT INTO tennista (nome, cognome, data_nascita, sesso)
VALUES ("Giorgia", "Astruni", "2002-07-10", "F");

INSERT INTO tennista (nome, cognome, data_nascita, sesso)
VALUES ("Adele", "Miscoli", "2002-07-08", "F");

UPDATE tennista
SET cognome = "Mascoli"
WHERE ID = 2;

UPDATE tennista
SET nome = "Giorgetta",
    cognome = "Astroni"
WHERE ID = 1;

DELETE FROM tennista
WHERE ID = 1;

SELECT *
FROM tennista;

SELECT *
FROM tennista
WHERE ID = 2;