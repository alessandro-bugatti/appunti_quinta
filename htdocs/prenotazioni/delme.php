<?php

include_once 'config.php';

//Query per recuperare i giorni disponibili
$sql = 'SELECT * FROM prenotazioni WHERE codice_fiscale = :codice';

//Invio la query al server MySQL
$stmt = $pdo->prepare($sql);

$stmt->execute([
    'codice' => 'BGT'
]);

//Estraggo le righe di risposta che finiranno come vettori in $result
$result = $stmt->fetch();
if ($result === false)
    echo "Non presente";
else
    var_dump($result);