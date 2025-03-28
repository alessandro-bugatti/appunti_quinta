-- Elenco di tutti i continenti

SELECT DISTINCT Continent
FROM country
ORDER BY Continent;

-- Quanti sono i cittadini europei

SELECT Continent, SUM(Population) AS abitanti_europei
FROM country
WHERE Continent = "Europe";

-- Quanti abitanti ci sono per ogni continente

SELECT Continent, SUM(Population) AS abitanti
FROM country
GROUP BY Continent ;

-- Quanti cittadini ci sono in Italia

SELECT country.Name, SUM(city.Population) AS cittadini, COUNT(*) AS numero_citta
FROM city, country
WHERE city.CountryCode = Country.Code
AND country.Name = "Italy";

-- Quanti cittadini ci sono in ogni stato
SELECT country.Name, SUM(city.Population) AS cittadini, COUNT(*) AS numero_citta
FROM city, country
WHERE city.CountryCode = Country.Code
GROUP BY country.Name
ORDER BY country.Name;

-- Quanti cittadini ci sono in percentuale sul totale degli abitanti di uno stato
SELECT country.Name, SUM(city.Population) / country.Population * 100 AS percentuale
FROM city, country
WHERE city.CountryCode = Country.Code
GROUP BY country.Name
ORDER BY country.Name;