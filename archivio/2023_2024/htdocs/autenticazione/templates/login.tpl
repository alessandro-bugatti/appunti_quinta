<?php $this->layout('home', ['titolo' => 'Esempio CRUD - login']) ?>

<h1>Login</h1>
<?php if(isset($login_fallito)):?>
    <div class="toast toast-error">
        Credenziali non corrette, riprova.
    </div>
<?php endif; ?>
<form class="form" action="index.php" method="post">
    <div class="form-group">
        <label class="form-label" for="username">Username</label>
        <input class="form-input" type="text" id="username" placeholder="Username" name="username">
    </div>
    <div class="form-group">
        <label class="form-label" for="password">Password</label>
        <input class="form-input" type="password" id="password" placeholder="Password" name="password">
    </div>
    <div class="float-right">
        <input class="btn btn-primary" type="submit" value="Invia credenziali">
    </div>
</form>
