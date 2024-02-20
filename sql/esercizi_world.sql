SELECT name, GNP/Population AS RedditoProCapite
FROM country
WHERE GNP/Population = (SELECT MIN(GNP/Population)
						FROM country
						WHERE GNP > 0)
						
SELECT COUNT(*)/(SELECT COUNT(*) FROM country)
FROM country
WHERE LifeExpectancy > 50

SELECT MAX(parlanti)
FROM (SELECT SUM(percentage*Population/100) AS parlanti
FROM country INNER JOIN countryLanguage ON country.code = 
countryLanguage.countryCode
GROUP BY language) AS a

CREATE TEMPORARY TABLE a
SELECT language, SUM(percentage*Population/100) AS parlanti
FROM country INNER JOIN countryLanguage ON country.code = 
countryLanguage.countryCode
GROUP BY language

