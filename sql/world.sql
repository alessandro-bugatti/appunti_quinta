SELECT city.name AS nome
FROM city JOIN country ON country.Code = city.CountryCode
WHERE country.Name = 'Germany'
ORDER BY nome;

SELECT MAX(LifeExpectancy) AS MassimaAspettiva,
       MIN(LifeExpectancy) AS MinimaAspettativa
FROM country;

SELECT COUNT(*) AS MaggioriCinquanta
FROM country
WHERE LifeExpectancy > 50;

SELECT SUM(country.SurfaceArea) AS SuperficieTotale
FROM country;

SELECT COUNT(*) AS IngleseUfficiale
FROM countrylanguage
WHERE Language = 'English'
AND IsOfficial = 'T';

-- Numero di stati africani

SELECT COUNT(*) AS stati_africani
FROM country
WHERE country.Continent = "Africa";


SELECT Continent, COUNT(*) AS numero_stati
FROM country
GROUP BY country.Continent
ORDER BY numero_stati DESC;


-- Raggruppamento 6
SELECT country.Continent, SUM(country.SurfaceArea) AS superficie
FROM country
GROUP BY Continent
ORDER BY superficie DESC;

-- Raggruppamento 8
SELECT country.Name, COUNT(*) AS lingue_parlate
FROM country JOIN countrylanguage
    ON country.Code = countrylanguage.CountryCode
GROUP BY country.Name
HAVING lingue_parlate >= 8
ORDER BY lingue_parlate DESC;

SELECT stato, lingue_parlate
FROM
    (SELECT country.Name AS stato, COUNT(*) AS lingue_parlate
    FROM country JOIN countrylanguage
    ON country.Code = countrylanguage.CountryCode
    GROUP BY country.Name) AS a
WHERE lingue_parlate >= 8
ORDER BY lingue_parlate DESC;

-- Sottoquery 2
SELECT Population AS abitanti, Name
FROM country
WHERE Population = (SELECT MAX(Population)
                    FROM country);

SELECT countrylanguage.Language, SUM(city.Population) as totale
FROM countrylanguage JOIN city
    ON countrylanguage.CountryCode = city.CountryCode
WHERE IsOfficial = "T"
GROUP BY Language
ORDER BY totale DESC;