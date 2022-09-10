# I Template

## Scopo

Lo scopo del meccanismo dei template è quello di poter suddividere meglio il codice quando si utilizza PHP per generare delle pagine HTML. Da questo punto di vista non è essenziale, ma per progetti da una certa complessità in poi aiuta molto, poichè:
- viene suddiviso il *controller* dalla *view*
- il *controller* conterrà il codice di business, cioè quello che manipola i dati secondo le funzionalità richieste
- la *view* conterrà la struttura HTML + del semplice codice PHP il cui unico scopo è mostrare i dati

La libreria utilizzata da noi è la libreria [Plates](https://platesphp.com/), che richiede solo la conoscenza di PHP e non di un linguaggio specifico per template.

## Composer

**Composer** è un *dipendency manager* per PHP che serve a gestire l'utilizzo di librerie esterne, ad esempio Plates.
Per installarlo basta seguire le istruzioni sul sito, una volta installato l'utilizzo che ne faremo noi può essere di due tipi:
1. se si vuole installare una libreria sola come Plates, basta utilizzare il comando

```bash
composer require league/plates
```
2. Creare a mano un file *composer.json* ad esempio fatto in questo modo
```json
{
  "require": {
    "league/plates": "3.*"
  }
}
```
e successivamente dare il comando
```bash
composer update
```

In tutti e due i casi il comando deve essere eseguito nella cartella di progetto. Apparirà una cartella *vendor* dove automaticamente sono state scaricate le librerie richieste.

## Architettura di Plates

Nei nostri esercizi useremo Plates nel seguente modo:
- inizialmente, nel controller, dobbiamo creare un oggetto di classe Engine. Per far questo dobbiamo prima di tutto caricare la libreria utilizzando il meccanismo di autoloading, con la seguente linea
```php
require 'vendor/autoload.php';
```
successivamente creiamo l'oggetto così

```php
$templates = new League\Plates\Engine('templates','phtml');
```

dove il primo parametro indica la cartella dove dovranno essere salvati tutti i template: nel nostro caso la cartella ha un percorso relativo poichè si trova nel nostro progetto. Il secondo parametro invece indica l'estensione che devono avere i nostri file di template, noi abbiamo scelto *phtml* perchè in uesto modo l'editor PHPStorm la tratta già correttamente, inoltre li differenziamo da quelli puramente PHP, che quindi hanno estensione *php*.

- alla fine del controller dobbiamo iniettare nel template che ci interessa i dati che abbiamo elaborato in precedenza, utilizzando il metodo *render*

```php
echo $templates->render('nome_template', $array);
```

dove il primo parametro è il nome del file che funge da template per questo controller, il secondo invece deve essere un array, della forma di una serie di coppie chiave-valore, dove la chiave è una stringa che rappresenta un nome di variabile che poi verrà usato nel template, e il valore è il contenuto della variabile che verrà usata nel template.

Il template dovrà all'interno "stampare" le variabili che arrivano dal controller in modo che siano visibili all'utente nella forma desiderata. Se si tratta di stampare una sola variabile l'istruzione più semplice è questa
```php
<?php=$variabile?>
```
