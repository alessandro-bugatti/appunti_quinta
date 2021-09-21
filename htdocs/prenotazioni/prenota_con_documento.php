<?php

require 'vendor/autoload.php';
include_once "config.php";

/**
 * @param int $length Lunghezza in byte del codice generato
 * @return string Il codice generato sotto forma di stringa esadecimale
 * @throws Exception
 */
function crea_codice(int $length)
{
    $bytes = random_bytes($length);
    $codice = bin2hex($bytes);
    return $codice;
}

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');
$target_dir = "documenti/";
//Variabili valorizzate tramite POST
$codice_fiscale = $_POST['codice'];
$giorno = $_POST['giorno'];
$uploadOk = true;

//Dovrebbero essere fatti molti altri controlli
//qui viene controllato solo se il file è un'immagine
$check = getimagesize($_FILES["documento"]["tmp_name"]);

if($check !== false) {
    $uploadOk = true;
} else {
    $uploadOk = false;
}
$codice_univoco = crea_codice($LUNGHEZZA_CODICE);
$imageFileType = strtolower(pathinfo($_FILES["documento"]["name"],PATHINFO_EXTENSION));
$target_file = $target_dir . basename($codice_univoco . '.' .
                            $imageFileType);

//Qui sarebbero da inserire i controlli se il caricamento è andato a buon fine o no
if (!($uploadOk && move_uploaded_file($_FILES["documento"]["tmp_name"], $target_file)))
    echo "Problema nell'upload";

//Controllo sul numero di persone per giorno
$sql = "SELECT COUNT(*) AS persone FROM prenotazioni WHERE giorno = :giorno_scelto";

//Inviamo la query al database che la tiene in pancia
$stmt = $pdo->prepare($sql);

$stmt->execute(
    [
        'giorno_scelto' => $giorno
    ]
);

$riga = $stmt->fetch();

$numero_persone = $riga['persone'];

if ($numero_persone >= $PERSONE_MASSIME_PER_GIORNO)
{
    echo $templates->render('data_non_disponibile', ['giorno' => $giorno]);
}
else
{
    //Query di inserimento preparata
    $sql = "INSERT INTO prenotazioni VALUES(null, :codice_fiscale, :giorno, 
                                :codice_univoco,false,null, :documento)";

    //Inviamo la query al database che la tiene in pancia
    $stmt = $pdo->prepare($sql);

    //Inviamo i dati concreti che verranno messi al posto dei segnaposto
    $stmt->execute(
        [
            'codice_fiscale' => $codice_fiscale,
            'giorno' => $giorno,
            'codice_univoco' => $codice_univoco,
            'documento' => $target_file
        ]
    );

    echo $templates->render('mostra_codice', ['codice_univoco' => $codice_univoco]);
}



