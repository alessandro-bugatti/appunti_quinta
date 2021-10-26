<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Rna Trascription</title>
</head>
<body>
<h1>
    <?php
    $stringa = $_POST['string'];
    $rna = '';
    $transcription = [
      'G' => 'C',
      'C' => 'G',
        'T' => 'A',
        'A' => 'U'
    ];
    for ($i = 0; $i < strlen($stringa); $i++)
        $rna .= $transcription[$stringa[$i]];
    echo "La trascrizione risulta " . $rna;
    // echo $transcription['G'];
    ?>
</h1>
</body>
</html>
