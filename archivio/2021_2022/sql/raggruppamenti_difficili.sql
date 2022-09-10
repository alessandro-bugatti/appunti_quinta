-- Quanti sono, in percentuale, gli stati in cui l'aspettativa di vita è maggiore
-- di 50 anni?

SELECT COUNT(*) / (SELECT count(*)
                    FROM country) * 100 AS percentuale
FROM country
WHERE LifeExpectancy > 50;

-- Qual è lo stato asiatico con il reddito procapite più alto?

SELECT Name, GNP/Population
FROM country
WHERE GNP/Population = (SELECT MAX(GNP/Population)
                        FROM country
                        WHERE Continent = 'Asia')
AND Continent = 'Asia';

-- Qual è la lingua più parlata al mondo e quante persone la parlano?
-- Questa query inizia ad essere più complicata, quindi può aver senso
-- affrontarla per passi successivi
-- 1 passo: quante persone parlano italiano
-- 2 passo: per ogni lingua, quante persone la parlano
-- 3 passo: metto tutto insieme quello che ho imparato in precedenza
-- 1
SELECT SUM(Population*Percentage/100) AS Totale
FROM country, countrylanguage
WHERE country.Code = countrylanguage.CountryCode
AND Language = 'Italian';
-- 2
SELECT Language,SUM(Population*Percentage/100) AS Totale
FROM country, countrylanguage
WHERE country.Code = countrylanguage.CountryCode
GROUP BY Language
ORDER BY Totale DESC;
-- 3 con imbroglio
SELECT Language,SUM(Population*Percentage/100) AS Totale
FROM country, countrylanguage
WHERE country.Code = countrylanguage.CountryCode
GROUP BY Language
ORDER BY Totale DESC
LIMIT 0, 1;
-- 3 corretta
SELECT Language, Totale
FROM (SELECT Language,SUM(Population*Percentage/100) AS Totale
        FROM country, countrylanguage
        WHERE country.Code = countrylanguage.CountryCode
        GROUP BY Language
        ORDER BY Totale DESC) AS Linguaggi
WHERE Totale = (SELECT MAX(Totale)
                FROM (SELECT Language,SUM(Population*Percentage/100) AS Totale
                        FROM country, countrylanguage
                        WHERE country.Code = countrylanguage.CountryCode
                        GROUP BY Language
                        ORDER BY Totale DESC) AS Linguaggi);

-- Per accorciare la scrittura vediamo due possibilità

-- Prima possibilità: creazione di una tabella temporanea
-- temporanea vuol dire che esiste in memoria solo per la durata
-- della connessione

CREATE TEMPORARY TABLE temporanea
SELECT Language,SUM(Population*Percentage/100) AS Totale
                        FROM country, countrylanguage
                        WHERE country.Code = countrylanguage.CountryCode
                        GROUP BY Language
                        ORDER BY Totale DESC;

SELECT Language, Totale
FROM temporanea
WHERE Totale = (SELECT MAX(Totale)
                FROM temporanea);

SELECT *
FROM temporanea;

-- Seconda possibilità, creo una vista (view)
CREATE VIEW Linguaggi AS
SELECT Language,SUM(Population*Percentage/100) AS Totale
                        FROM country, countrylanguage
                        WHERE country.Code = countrylanguage.CountryCode
                        GROUP BY Language
                        ORDER BY Totale DESC;

SELECT Language, Totale
FROM Linguaggi
WHERE Totale = (SELECT MAX(Totale)
                FROM Linguaggi);

DROP VIEW Linguaggi;

-- Qual è la città del Medio Oriente la cui popolazione è più vicina per
-- difetto alla popolazione media delle città del Miodo Oriente?

-- Scomposta in Query più semplici
-- Elenco delle città del Medio Oriente
SELECT city.Name, city.Population
FROM city, country
WHERE country.Code = city.CountryCode
AND country.Region = 'Middle East';

-- Media delle popolazioni delle città del Medio Oriente
SELECT AVG(city.Population)
FROM city, country
WHERE country.Code = city.CountryCode
AND country.Region = 'Middle East';