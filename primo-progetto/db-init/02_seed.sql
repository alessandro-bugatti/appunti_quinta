-- Dati iniziali del progetto
-- Questo file viene eseguito automaticamente al primo avvio del container database.

-- Utente admin di prova (password: admin123)
-- Per generare un nuovo hash esegui:
--   docker exec <PROJECT_NAME>_web php -r "echo password_hash('nuova_password', PASSWORD_DEFAULT);"
INSERT INTO utenti (username, password, nome) VALUES
    ('admin', '$2y$10$OJdqC5xuz09fJK3WrV7wZOsbgLMrHT2iqaKEPHOmH6li/Hu6wYm/.', 'Amministratore');

-- Aggiungi qui i dati di esempio del progetto...
