SELECT caseficio.name, SUM(forme_vendute) AS numero_forme
FROM caseificio, attivita
WHERE caseificio.codice = attivita.codice_caseificio
AND data <= :data_fine
AND data >= :data_inizio
GROUP BY caseificio.codice

SELECT provincia.nome, AVG(attivita.lattelavorato) AS media
FROM attivita, caseificio, provincia
WHERE caseificio.codice = attivita.caseificio_codice
AND caseificio.codice_provincia = provincia.codice
AND YEAR(attivita.data) = YEAR(CURDATE()) // YEAR(NOW())
GROUP BY provincia.codice


-- Versione uno, sporca, veloce e non sempre corretta
SELECT caseificio.nome, caseficio.indirizzo, blablabla , COUNT(*) AS forme_vendute
FROM caseificio, forma
WHERE caseficio.codice = forma.codice_caseificio
AND scelta = "prima"
AND YEAR(data) = :anno_scelto
GROUP BY caseficio.codice
ORDER BY forme_vendute DESC
LIMIT 0, 1

-- Versione due, corretta ma più complessa da scrivere
SELECT caseficio.nome, caseficio.indirizzo, forme_vendute
FROM (SELECT caseificio.nome, caseficio.indirizzo,      COUNT(*) AS forme_vendute
        FROM caseificio, forma
        WHERE caseficio.codice = forma.codice_caseificio
        AND scelta = "prima"
        AND YEAR(data) = :anno_scelto 
        GROUP BY caseficio.codice) AS tabella_A
WHERE forme_vendute = (SELECT MAX(forme_vendute)
                        FROM (SELECT COUNT(*) AS forme_vendute
                        FROM caseificio, forma
                        WHERE caseficio.codice = forma.codice_caseificio
                        AND scelta = "prima"
                        AND YEAR(data) = :anno_scelto 
                        GROUP BY caseficio.codice) AS tabella_A)
                        
-- Primo modo per semplificare la query precedente
-- utilizzando una vista
CREATE VIEW tabella_A AS
SELECT caseificio.nome, caseficio.indirizzo, COUNT(*) AS forme_vendute
FROM caseificio, forma
WHERE caseficio.codice = forma.codice_caseificio
AND scelta = "prima"
AND YEAR(data) = :anno_scelto 
GROUP BY caseficio.codice

SELECT caseficio.nome, caseficio.indirizzo, forme_vendute
FROM tabella_A
WHERE forme_vendute = (SELECT MAX(forme_vendute)
                        FROM tabella_A)

SELECT caseficio.nome, caseficio.indirizzo, forme_vendute
FROM tabella_A
WHERE forme_vendute = (SELECT MIN(forme_vendute)
                        FROM tabella_A)


-- Secondo modo per semplificare la query
-- utilizzando una tabella temporanea
-- che dura soltanto all'interno della sessione
CREATE TEMPORARY TABLE tabella_A 
SELECT caseificio.nome, caseficio.indirizzo, COUNT(*) AS forme_vendute
FROM caseificio, forma
WHERE caseficio.codice = forma.codice_caseificio
AND scelta = "prima"
AND YEAR(data) = :anno_scelto 
GROUP BY caseficio.codice

SELECT caseficio.nome, caseficio.indirizzo, forme_vendute
FROM tabella_A
WHERE forme_vendute = (SELECT MAX(forme_vendute)
                        FROM tabella_A)

















