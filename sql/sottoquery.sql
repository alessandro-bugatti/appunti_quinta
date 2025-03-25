-- Sottoquery

-- Stato con l'aspettativa di vita massima
SELECT LifeExpectancy, Name
FROM country
WHERE LifeExpectancy = (SELECT MAX(LifeExpectancy) AS aspettativa FROM country);


-- Stato con il reddito procapite minimo
SELECT Name, GNP / Population * 1000000 as reddito_pro_capite
FROM country
WHERE GNP > 0
AND Population > 0
AND GNP / Population * 1000000 = (SELECT MIN(GNP / Population) * 1000000
                        FROM country
                        WHERE GNP > 0
                        AND Population > 0)

