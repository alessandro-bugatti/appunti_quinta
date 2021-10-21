<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Hello name</title>
</head>
<body>
    <h1>
    <?php
        $stringa_originale = $_POST['stringa'];
        $stringa_invertita = '';
        for ($i = strlen($stringa_originale) - 1; $i >= 0; $i--)
            $stringa_invertita .= $stringa_originale[$i];
        echo 'La stringa originale era <em>' . $stringa_originale .
            '</em>, mentre quella invertita diventa <em>'.
            $stringa_invertita . '</em>';
        ?>
    </h1>
</body>
</html>


