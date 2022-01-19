-- In quante nazioni l'inglese è la lingua ufficiale
SELECT COUNT(*) AS tot_nazioni
FROM countrylanguage
WHERE Language = 'English'
AND IsOfficial = 'T';

-- Qual è la media degli abitanti delle città in cui si parla tedesco,
-- considerando che le città in cui si parla tedesco sono quelle che appartengono
-- a uno stato in cui si parla tedesco

SELECT AVG(Population), COUNT(*)
FROM city, countrylanguage
WHERE city.CountryCode = countrylanguage.CountryCode
AND Language = 'German';

-- QUal è la media delle percentuali dei linguaggi parlati in Africa
SELECT AVG(Percentage) AS media_percentuali
FROM countrylanguage, country
WHERE countrylanguage.CountryCode = country.Code
AND Continent = 'Africa';

-- Fai una lista di tutti i continenti con gli stati contenuti in ognuno,
-- ordinati da quello che ne ha di più a quello che ne ha di meno
SELECT Continent, COUNT(*) AS N_stati
FROM country
GROUP BY Continent
ORDER BY N_stati DESC;

-- Fai una lista di tutte le forme di governo con il numero degli stati appartenenti
-- ad ognuna ordinati dalla forma di governo più popolare a quella meno popolare.
SELECT GovernmentForm, COUNT(*) AS N_stati
FROM country
GROUP BY GovernmentForm
ORDER BY N_stati DESC;

-- Fai una lista di tutti i continenti con il numero di paesi per ogni continente
-- in cui il prodotto interno lordo è aumentato nell'ultimo anno.

SELECT Continent, COUNT(*) AS N_stati
FROM country
WHERE GNP > country.GNPOld
GROUP BY Continent
ORDER BY N_stati DESC;

-- Qual è il continente che contiene più stati e quanti sono?
-- Soluzione con il 'trucco'
SELECT Continent, COUNT(*) AS N_stati
FROM country
GROUP BY Continent
ORDER BY N_stati DESC
LIMIT 0, 1;

-- Fai una lista di tutte le nazioni con il numero di città contenute in ognuna
-- di esse, ordinate per numero di città.
SELECT country.name, COUNT(*) N_citta
FROM country, city
WHERE country.Code = city.CountryCode
GROUP BY country.name
ORDER BY N_citta DESC;

-- Fai una lista di tutti i continenti ordinati per superficie totale.
SELECT Continent, SUM(SurfaceArea) AS superficie
FROM country
GROUP BY Continent
ORDER BY superficie DESC;
