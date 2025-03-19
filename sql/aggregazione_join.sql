SELECT Name, SurfaceArea
FROM country

ORDER BY SurfaceArea DESC
LIMIT 0, 3;

SELECT COUNT(*) AS grandi, SUM(SurfaceArea) as superficie_totale
FROM country
WHERE SurfaceArea > 500000;

SELECT SUM(Population) AS totale_persone
FROM country
WHERE Continent = "Asia";

-- ATTENZIONE, non si può mettere nella proiezione un operatore di aggregazione e una colonna
SELECT MAX(LifeExpectancy), Name
FROM country;

SELECT MIN(GNP / Population) * 1000000 AS reddito_pro_capite
FROM country
WHERE GNP > 0
AND Population > 0


-- Elenco di tutte le città del mondo con il proprio stato
SELECT city.Name AS name, country.Name AS stato
FROM city, country
WHERE city.CountryCode = country.Code

-- Numero di città dell'Asia
SELECT COUNT(*) AS citta_asiatiche
FROM city, country
WHERE city.CountryCode = country.Code
AND Continent = "Asia";

-- Sintassi esplicita della JOIN

SELECT city.Name AS name, country.Name AS stato
FROM city INNER JOIN country
ON city.CountryCode = country.Code


