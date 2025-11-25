CREATE INDEX index_cognome ON tennista(cognome);

ALTER TABLE tennista
ADD COLUMN guadagni_totali FLOAT;

ALTER TABLE tennista
MODIFY COLUMN cognome VARCHAR(100);

ALTER TABLE tennista
CHANGE COLUMN data_nascita data_pro DATE;

ALTER TABLE tennista
DROP COLUMN guadagni_totali;