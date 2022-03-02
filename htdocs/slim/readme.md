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

**Attenzione**: il parametro nella chiamata al metodo ```setBasePath``` deve rispecchiare l'esatta struttura delle cartelle dove si trova l'applicazione. In questo esempio il metodo viene chiamato in questo modo
```php
$app->setBasePath("/slim");
```
perchè l'applicazione si trova nella sottocartella *slim* all'interno della root del web server, se ad esempio la cartella si trovasse nella cartella *5AI/slim* allora l'istruzione andrebbe riscritta come
```php
$app->setBasePath("/5AI/slim");
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

RewriteRule ^ public/index.php [QSA,L]
```

A questo punto dovrebbe essere sufficiente inserire l'indirizzo ```localhost/slim``` nella barra degli indirizzi del browser e dovrebbe apparire una pagina con la scritta **Hello world**. Per ulteriore conferma provare  a inserire ```localhost/slim/altra_pagina``` e dovrebbe comparire il testo **Questa è un'altra pagina**.

## Gestione degli errori
Slim prevede già un meccanismo di gestione degli errori/eccezioni con un proprio Middleware, per attivarlo è sufficiente introdurre questa riga di codice

```php
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
```

Di default il comportamento è quello di intercettare errori/eccezioni e mandare in risposta una pagina HTML con le informazioni sul problema, eventualmente con anche i dettagli dello stack di chiamate nel caso il 
primo parametro fosse uguale a ```true```, come nell'esempio qua sopra. Gli altri due parametri sono rilevanti solo se si utilizza un meccanismo di *logging*, per maggiori informazioni fare riferimento 
alla [documentazione ufficiale](https://www.slimframework.com/docs/v4/middleware/error-handling.html).

## Utilizzare Plates
Volendo utilizzare la libreria di templates Plates, come già fatto in precedenza, dovrà essere
importata con il solito comando
```bash
composer require league/plates
```
e nel codice andrà indicata con 
```php
use League\Plates\Engine;
```

ed è poi buona cosa utilizzare un [Dipendency Injector](https://en.wikipedia.org/wiki/Dependency_injection) per utilizzarla all'interno dei Slim. Senza dilungarsi sul concetto
di Dipendency Injection, lo scopo è quello di separare in maniera pulita un servizio (in questo caso
Plates) dall'applicazione vera e propria che utilizzerà quel servizio.
In pratica per ottenere lo scopo bisogna prima importare una libreria che implementi il meccanismo
di DI, e Slim suggerisce di utilizzare PHP-DI, e con Composer si fa

```bash
composer require php-di/slim-bridge:* --with-all-dependencies
```

Fatto questo, basterà aggiungere nel codice la creazione del Container, che poi dovrà essere
passato all'applicazione

```php
$container = new Container();
//da inserire prima della create di AppFactory
AppFactory::setContainer($container);
```

Per aggiungere dei servizi al container è sufficiente usare il metodo ```set```, che nel caso specifico
di Plates verrà fatto in questo modo

```php
$container->set('template', function (){
    return new League\Plates\Engine('../templates', 'phtml');
});
```
dove il primo parametro è la chiave per recuperare il servizio e il secondo è la funzione anonima
che ritorna il servizio, occupandosi della sua creazione.
**Attenzione**: il primo parametro del costruttore dell'Engine deve come al solito contenere la cartella
dove poi verranno inseriti i vari template, ma il percorso deve essere relativo al file dove si trovano
queste istruzioni: nel nostro caso in cui il file ```index.php``` si trova nella cartella **public** il nome della cartella deve essere preceduto da ```../```.

Una volta aggiunto Plates nel container, per poterlo utilizzare basterà aggiungere del codice come il
seguente nelle callback per le rotte su cui vogliamo usare dei template.

```php
$app->get('/template/{name}', function (Request $request, Response $response, $args) {
    $template = $this->get('template');
    $variabile = [ 'name' => $args['name']];
    $response->getBody()->write($template->render('esempio', $variabile));
    return $response;
});
```