-- Elenco delle città italiane
SELECT city.Name
FROM city, country
WHERE city.CountryCode = country.Code
AND country.Name = 'Italy';

-- Elenco delle città italiane con sintassi INNER JOIN
SELECT city.Name
FROM city INNER JOIN country
ON city.CountryCode = country.Code
WHERE country.Name = 'Italy';

-- Elenco dei linguaggio parlati in Italia
SELECT DISTINCT Language
FROM country, countrylanguage
WHERE countrylanguage.CountryCode = country.Code
AND country.Continent = 'Europe'
ORDER BY Language;

-- Operatori di aggregazione
-- COUNT, numero degli stati nel database
SELECT COUNT(*) AS NumeroStati
FROM country;

-- COUNT, numero delle lingue parlate in Africa
SELECT COUNT(DISTINCT Language) AS NumeroLingueAfricane
FROM country, countrylanguage
WHERE countrylanguage.CountryCode = country.Code
AND country.Continent = 'Africa'
ORDER BY Language;

-- MAX, PIL maggiore di tutti in dollari
SELECT MAX(GNP*1000000) AS PILMaggiore
FROM country;

-- AVG, PIL medio mondiale
SELECT AVG(GNP) AS PILMedio
FROM country;

-- MAX, reddito procapite medio
SELECT MAX(GNP/Population)*1000000 AS PILMaggiore
FROM country;

-- AVG, media calcolata con AVG e confronto con quella calcolata come rapporto
SELECT AVG(Population), SUM(Population)/COUNT(*) AS PopolazioneMediaStato
FROM country;

-- SUM, popolazione mondiale
SELECT SUM(Population) PopolazioneMondiale
FROM country;
