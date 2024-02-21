SELECT name, GNP/Population AS RedditoProCapite
FROM country
WHERE GNP/Population = (SELECT MIN(GNP/Population)
						FROM country
						WHERE GNP > 0)
						
SELECT COUNT(*)/(SELECT COUNT(*) FROM country)
FROM country
WHERE LifeExpectancy > 50

-- Quante persone parlano la lingua più parlata al mondo

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

SELECT MAX(Parlanti)
FROM a

-- Qual è la lingua più parlata al mondo e quante persone la parlano

SELECT language, parlanti
FROM (SELECT language, SUM(percentage*Population/100) AS parlanti
FROM country INNER JOIN countryLanguage ON country.code = 
countryLanguage.countryCode
GROUP BY language) AS a
WHERE parlanti = (SELECT MAX(parlanti) FROM 
(SELECT SUM(percentage*Population/100) AS parlanti
FROM country INNER JOIN countryLanguage ON country.code = 
countryLanguage.countryCode
GROUP BY language) AS b)

CREATE TEMPORARY TABLE a
SELECT language, SUM(percentage*Population/100) AS parlanti
FROM country INNER JOIN countryLanguage ON country.code = 
countryLanguage.countryCode
GROUP BY language

SELECT language, parlanti
FROM a
WHERE parlanti = (SELECT MAX(parlanti) FROM a)

CREATE VIEW a AS
SELECT language, SUM(percentage*Population/100) AS parlanti
FROM country INNER JOIN countryLanguage ON country.code = 
countryLanguage.countryCode
GROUP BY language



