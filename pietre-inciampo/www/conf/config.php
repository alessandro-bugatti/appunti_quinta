<?php

// Ambiente: 'development' o 'production'
define('APP_ENV', $_ENV['APP_ENV'] ?? 'development');

// Mostra handler di errore personalizzato
define('MY_ERROR_HANDLER', false);

// Percorso storage immagini locale (usato finché non si passa a S3)
define('STORAGE_PATH', __DIR__ . '/../storage/');
define('STORAGE_URL', '/storage/');

// Database
define('DB_HOST', $_ENV['MYSQL_HOST']     ?? 'database');
define('DB_NAME', $_ENV['MYSQL_DATABASE'] ?? '');
define('DB_USER', $_ENV['MYSQL_USER']     ?? '');
define('DB_PASSWORD', $_ENV['MYSQL_PASSWORD'] ?? '');
define('DB_CHAR', 'utf8mb4');
