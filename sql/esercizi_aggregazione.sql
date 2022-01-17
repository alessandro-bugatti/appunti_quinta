-- Quanti sono gli abitanti della vittà più popolosa e di quella meno popolosa
SELECT MAX(Population) AS massimo, MIN(Population) AS minimo
FROM city

-- Quante sono le città con più di 5 milioni di abitanti
SELECT COUNT(*) AS citta_grosse
FROM city
WHERE Population > 5000000

-- Quali sono le città con più di 5 milioni di abitanti
SELECT Name, Population
FROM city
WHERE Population > 5000000
ORDER BY Population DESC;

-- Quanti sono gli abitanti della vittà più popolosa e di quella meno popolosa
-- dell'Europa Occidentale
SELECT MAX(city.Population) AS massimo, MIN(city.Population) AS minimo
FROM city, country
WHERE city.CountryCode = country.Code
AND country.Region = 'Western Europe';

-- Altro modo di fare la query precedente con l'inner join
SELECT MAX(city.Population) AS massimo, MIN(city.Population) AS minimo
FROM city INNER JOIN country
ON city.CountryCode = country.Code
WHERE country.Region = 'Western Europe';
