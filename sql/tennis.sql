SELECT DISTINCT tourney_fin_currency
FROM tournaments
WHERE tourney_fin_currency IS NOT NULL;

SELECT COUNT(*) AS n_mancini
FROM players
WHERE handedness = "Left-Handed";

-- Teniamolo in sospeso per utilizzare una query annidata
-- Al momento non è corretto
SELECT winner_name AS giocatore,
       SUM(winner_games_won) +
       SUM(loser_games_won) AS game_vinti
FROM match_scores
WHERE winner_name = "Alexander Bublik"
    OR loser_name = "Alexander Bublik";

-- Game vinti da Bublik nelle partite in cui è stato vincitore
SELECT winner_name AS giocatore,
       SUM(winner_games_won) AS game_vinti
FROM match_scores
WHERE winner_name = "Alexander Bublik";

-- Le altezze dei giocatori più alti e più bassi
SELECT MAX(height_cm) AS altezza_massima, MIN(height_cm) AS altezza_minima
FROM players
WHERE height_cm > 100;

-- Errore madornale
SELECT MAX(height_cm) AS altezza_massima, last_name, first_name
FROM players;

SELECT AVG(height_cm) AS altezza_media, COUNT(*) AS tennisti
FROM players
WHERE height_cm > 100;

-- Qual è il giocatore (o i giocatori) più alti del circuito ATP
SELECT  last_name AS cognome,
        first_name AS nome, height_cm AS altezza
FROM players
WHERE height_cm = (SELECT MAX(height_cm) AS altezza_massima
                    FROM players);

-- Qual è il giocatore (o i giocatori) più bassi del circuito ATP
SELECT  last_name AS cognome,
        first_name AS nome, height_cm AS altezza
FROM players
WHERE height_cm = (SELECT MIN(height_cm) AS altezza_massima
                    FROM players
                    WHERE height_cm > 100);