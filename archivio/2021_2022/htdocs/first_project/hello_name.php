<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Hello name</title>
</head>
<body>
    <h1>
    <?php
        echo "Hello ";
        if (array_key_exists('nome', $_POST))
            echo $_POST['nome'];
        else
            echo " sconosciuto";
    ?>
    </h1>
</body>
</html>


