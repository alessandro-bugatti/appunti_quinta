-- Qual è il paese con il maggior prodotto interno lordo
SELECT Name, GNP
FROM country
WHERE GNP = (SELECT MAX(GNP)
            FROM country);

-- Qual è il paese con il minor prodotto interno lordo
-- Interessante perchè produce più righe
SELECT Name, GNP
FROM country
WHERE GNP = (SELECT MIN(GNP)
            FROM country);

-- Qual è il paese con il minor prodotto interno lordo
-- La stessa query fatta con il trucco dell'ordinamento e del LIMIT
-- non da il risultato corretto
SELECT Name, GNP
FROM country
ORDER BY GNP
LIMIT 0, 1

-- Qual è il paese con il maggior numero di abitanti?
SELECT Name, Population
FROM country
WHERE Population = (SELECT Max(Population)
                    FROM country);

-- Qual è il paese con il reddito procapite più alto?
SELECT Name, GNP/Population*1000000 AS reddito_procapite
FROM country
WHERE GNP/Population = (SELECT MAX(GNP/Population)
                        FROM country)

-- Qual è il paese con il reddito procapite più basso, escludendo i paesi che
 -- hanno il GNP a zero?

SELECT Name, GNP/Population*1000000 AS reddito_procapite
FROM country
WHERE GNP/Population = (SELECT MIN(GNP/Population)
                        FROM country
                        WHERE GNP > 0);

