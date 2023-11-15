<html lang="it">
<head>
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, user-scalable=0;"/>
    <title>Esempio di campi di input</title>
    <style>
        @media print {
            .blocco {page-break-before: always;}
        }
    </style>
</head>
<body>
<div class="columns">
<div class="column col-9 col-sm-12">
    <form class="form-horizontal" action="" method="post">
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-example-4">Name</label>
            </div>
            <div class="col-9 col-sm-12">
                <input name="nome" class="form-input" id="input-example-4" type="text" placeholder="Name">
            </div>
        </div>
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-example-42">Name</label>
            </div>
            <div class="col-9 col-sm-12">
                <input name = "password" class="form-input" id="input-example-42" type="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-example-5">Email</label>
            </div>
            <div class="col-9 col-sm-12">
                <input name ="email" class="form-input" id="input-example-5" type="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-example-5">Età</label>
            </div>
            <div class="col-9 col-sm-12">
                <input name ="eta" class="form-input" id="input-example-5" type="number" min="0" max="10" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label">Gender</label>
            </div>
            <div class="col-9 col-sm-12">
                <label class="form-radio">
                    <input type="radio" name="gender" value="male"><i class="form-icon"></i> Male
                </label>
                <label class="form-radio">
                    <input type="radio" name="gender" checked="" value="female"><i class="form-icon"></i> Female
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label">Source</label>
            </div>
            <div class="col-9 col-sm-12">
                <select name="tool" class="form-select">
                    <option>Slack</option>
                    <option>Skype</option>
                    <option>Hipchat</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-9 col-sm-12 col-ml-auto">
                <label class="form-switch">
                    <input name="sendme" type="checkbox"><i class="form-icon"></i> Send me emails with news and tips
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-3 col-sm-12">
                <label class="form-label" for="input-example-6">Message</label>
            </div>
            <div class="col-9 col-sm-12">
                <textarea name="message" class="form-input" id="input-example-6" placeholder="Textarea" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-9 col-sm-12 col-ml-auto">
                <label class="form-checkbox">
                    <input name="rememberme" type="checkbox"><i class="form-icon"></i> Remember me
                </label>
            </div>
        </div>
        <input type="submit">
    </form>
</div>
</div>

<pre>
    <?php
        if (isset($_POST['nome']))
            var_dump($_POST);

    ?>
</pre>
<p>I campi di tipo check box vanno controllati con <code>isset</code> per
    verificare se sono stati selezionati o meno.</p>
<?php
if (isset($_POST['sendme']))
    echo "<p>Campo sendme selezionato, invio della newsletter</p>";
?>

<?php
    if (isset($_POST['rememberme']))
        echo "<p>Campo rememberme selezionato, memorizza le informazioni per la prossima sessione</p>";
?>

</body>
</html>