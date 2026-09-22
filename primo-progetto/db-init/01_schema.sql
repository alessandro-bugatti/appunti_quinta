-- Schema del progetto: sostituisci con le tue tabelle
-- Encoding: utf8mb4 (Unicode completo)

-- Esempio: tabella utenti (spesso utile come punto di partenza)
CREATE TABLE IF NOT EXISTS utenti
(
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(50)  NOT NULL UNIQUE,
    password   VARCHAR(255) NOT NULL,
    nome       VARCHAR(80)  NULL,
    created_at DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

-- Aggiungi qui le altre tabelle del progetto...
