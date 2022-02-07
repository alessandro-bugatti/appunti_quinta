# Come creare la prima applicazione in Slim

Sito di riferimento: [Slim](https://www.slimframework.com/docs/v4/)

## Come installare

In un mondo ideale senza proxy basta usare Composer.

```bash
composer require slim/slim:"4.*"
```

Se invece in laboratorio fosse impossibile usarlo per via del proxy farsi passare da chi lavora su un proprio computer il folder *vendor* creato da Composer, come già fatto per Plates.

Successivamente è necessario un altro componente per gestire le richieste sempre con Composer.

```bash
composer require slim/psr7
```

Lo stesso discorso fatto prima sul proxy vale anche qua.

A questo punto creare nel progetto una cartella *public* e al suo interno inserire il file *index.php*, che diventerà il front-controller dell'applicazione, cioè ogni richiesta passerà attraverso di lui.

Il contenuto di questo file può essere popolato in questo modo

```php
<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

//Questa parte deve essere sostituita con il nome della propria+
//sottocartella dove si trova l'applicazione
$app->setBasePath("/slim");

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/altra_pagina', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Questa è un'altra pagina");
    return $response;
});

$app->run();
```

## Configurare Apache per l'URL rewriting
Poichè l'applicazione ha bisogno che tutte le richieste HTTP arrivino al file *index.php*, è necessario istruire il web server per fare in modo che ogni richiesta che arriva faccia partire il file *index.php*, indipendentemte da quale sia la richiesta presente nell'URL.

Usando Apache presente in Xampp bisogna seguire questi passi
- abilitare il modulo di URL rewriting. Per far questo aprire con un editor di testo (anche PHPStorm va bene) il file ```directory_di_xampp/apache/conf/httpd.conf``` e controllare se la riga
```apacheconf
LoadModule rewrite_module modules/mod_rewrite.so
```
ha un **#** davanti, se così fosse va eliminato. Si faccia la stessa cosa per la riga
```apacheconf
LoadModule actions_module modules/mod_actions.so
```

A questo punto bisogna far partire o ripartire Apache e la configurazione
dovrebbe essere corretta (per ulteriori informazioni consultare [questa pagina](https://www.slimframework.com/docs/v4/start/web-servers.html) oppure Google).

Infine, per fare in modo che tutte le richieste vengano dirottate sul file *index.php* che si trova nella cartella *public* bisogna aggiungere nella cartella
principale, *slim* in questo esempio, un file *.htaccess* con il seguente contenuto:
```apacheconf
RewriteEngine On
RewriteBase /slim/public
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```

A questo punto dovrebbe essere sufficiente inserire l'indirizzo ```localhost/slim``` nella barra degli indirizzi del browser e dovrebbe apparire una pagina con la scritta **Hello world**. Per ulteriore conferma provare  a inserire ```localhost/slim/altra_pagina``` e dovrebbe comparire il testo **Questa è un'altra pagina**.