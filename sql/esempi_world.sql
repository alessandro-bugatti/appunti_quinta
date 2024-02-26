SELECT city.Name
FROM city, country
WHERE city.CountryCode = country.Code
AND country.Name = 'Italy'
ORDER BY city.Name;

SELECT city.Name
FROM city INNER JOIN country ON city.CountryCode = country.Code
WHERE country.Name = 'Italy'
ORDER BY city.Name;

-- NUmero di persone in un certo stato per ogni lingua quante persone la parlano
-- Scegliamo come esempio l'Italia

SELECT country.name,countrylanguage.Language,
       FLOOR(country.Population * countrylanguage.Percentage / 100) AS persone

FROM country INNER JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE country.LocalName = 'Italia'
ORDER BY persone DESC;

-- La lingua officiale di ogni stato del mondo

SELECT country.name,countrylanguage.Language
FROM country INNER JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.IsOfficial = 'T'
ORDER BY country.Name;

-- L'elenco delle città negli stati in cui si parla inglese come lingua principale
-- dove per principale si intende che la parla più dell'80% della popolazione

SELECT city.name, country.name
FROM city INNER JOIN country ON city.CountryCode = country.Code
INNER JOIN countrylanguage ON countrylanguage.CountryCode = country.Code
WHERE countrylanguage.Language ='English'
AND countrylanguage.Percentage > 80
ORDER BY country.Name, city.Name

-- The average year of indipendence of allt the countries in the world

SELECT ROUND(AVG(country.IndepYear)) AS AIYOTW
FROM country;

-- NUmber of the languages spoken in a country (Italy for example)

SELECT COUNT(countrylanguage.Language) AS NumberOfLanguages
FROM countrylanguage INNER JOIN country ON countrylanguage.CountryCode
= country.Code
WHERE country.Name = 'Italy';

-- Vogliamo sapere qual è lo stato con il GNP più alto
SELECT country.GNP, country.Name
FROM country
WHERE country.GNP = (SELECT MAX(GNP)
                    FROM country)

SELECT country.LifeExpectancy, country.Name
FROM country
WHERE country.LifeExpectancy = (SELECT MAX(country.LifeExpectancy)
                                FROM country)

-- QUal è lo stato in cui ci sono più persone che parlano inglese

SELECT country.Name, FLOOR(country.Population * countrylanguage.Percentage / 100) AS persone
FROM country INNER JOIN countrylanguage ON countrylanguage.CountryCode = country.Code
WHERE countrylanguage.Language = 'English'
AND country.Continent = 'Europe'
AND country.Population * countrylanguage.Percentage = (SELECT MAX(country.Population * countrylanguage.Percentage)
                                                       FROM country INNER JOIN countrylanguage ON countrylanguage.CountryCode = country.Code
                                                       WHERE countrylanguage.Language = 'English'
                                                       AND country.Continent = 'Europe')

-- Popolazione europea
SELECT SUM(Population) as PopolazioneEuropea
FROM country
WHERE Continent = 'Europe'

-- Popolazione di tutti i continenti

SELECT Continent, SUM(Population) as Popolazione
FROM country
GROUP BY Continent
ORDER BY Popolazione DESC

-- NUmero di città contenute in ogni stato
SELECT country.Name AS Stato, COUNT(*) AS NumeroCitta
FROM country INNER JOIN city ON country.Code = city.CountryCode
GROUP BY country.Code
HAVING NumeroCitta >= 10
ORDER BY NumeroCitta DESC

-- Numero di persone che parlano inglese in ogni continente


-- Esempio di create view
CREATE VIEW a AS
SELECT language, SUM(percentage*Population/100) AS parlanti
FROM country INNER JOIN countryLanguage ON country.code =
countryLanguage.countryCode
GROUP BY language


SELECT COUNT(*)
FROM countrylanguage;

SELECT COUNT(*)
FROM (
SELECT language
FROM countrylanguage
GROUP BY language) AS b;

SElECT COUNT(DISTINCT language)
FROM countrylanguage;

SELECT DISTINCT language
FROM countrylanguage
WHERE Language LIKE 'I%';

SELECT DISTINCT GovernmentForm, Name
FROM country
WHERE GovernmentForm LIKE '%chy%';

SELECT HeadOfState, Name
    FROM country
WHERE GNP = 0;
