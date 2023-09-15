# Primo esempio di utilizzo dell'accesso ai database



In questi codici viene mostrato come accedere a un database MySQL/MariaDB utilizzando PDO, gli esempio sono quelli visti in classe, non tutti sono finiti, ma sufficientemente avanzati da poter essere usati come esempi ed eventualmente completati. Il database utilizzato per estrarre i dati è quello visto durante
l'attività CLIL sulle elezioni presidenziali degli Stati Uniti, che si può trovare
nel file `us_presidential_elections.zip` e, per chi non l'avesse ancora fatto, va
importato nel proprio server utilizzando una delle procedure viste a lezione.

Segue un elenco dei codici e dell'ordine in cui guardarli

- **primo_esempio_pdo**: quello in cui viene mostrato tutto l'elenco degli stati degli Stati Uniti (template corrispodente: **elenco_stati_us.tpl**)
- **candidates_form** e **candidates_by_state_year**: quelli in cui viene richiesto di scegliere uno stato e un anno, presi da dei menù a tendina popolati attraverso delle query al database, e successivamente vengono mostrati i candidati presenti nello stato scelto e in quell'anno (template corrispondenti: **candidates_form.tpl** ed **elenco_candidati.tpl**)
- **flags**: quello che mostra tutte le bandiere degli stati americani, recuperate da un sito esterno, e le utilizza come link verso un'altra pagina (**state_selected**) per mostrare il funzionamento del metodo `GET`.
- **candidate_name** e **candidate_links_year**: quello dove viene inserito il nome di un candidato nel form iniziale (candidate_name) e si utilizza la clausola `LIKE` di SQL per recuperare il candidato anche se viene inserito solo parte del nominativo. La pagina che riceve la richiesta mostra gli anni in cui quel candidato si è presentato alle elezioni presidenziali, come link che nei parametri `GET` contengono l'anno e il nome completo del candidato. La pagina `candidates.php` che dovrebbe essere usata per mostrare gli stati in cui quel candidato si è presentato in quegli anni specifici è lasciata come esercizio per il lettore.