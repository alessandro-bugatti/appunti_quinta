-- Elenco degli abitanti di tutti i continenti
-- usando una query con l'operatore di raggruppamento GROUP BY
SELECT Continent, SUM(Population) AS abitanti
FROM country
GROUP BY Continent
ORDER BY abitanti DESC;
