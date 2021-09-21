<?php $this->layout('main',['argomento' => 'Registrazione']); ?>

<mark class="secondary">Attenzione <?= $username ?>, registrando un utente avrà i tuoi stessi privilegi</mark>

    <div class="row">
        <div class="col-sm">
        </div>
        <!-- Adding some flex properties to center the form and some height to the page, these can be omitted -->
        <div class="col-sm-12 col-md-8 col-lg-6" style="height: calc(100vh - 10.25rem); display: flex; align-items: center; flex: 0 1 auto;">
            <form action="esito_registrazione.php" method="post">
                <fieldset>
                    <legend>Registrazione</legend>
                    <div class="input-group fluid">
                        <label for="username" style="width: 180px;">Username</label>
                        <input type="text" value="" id="username" placeholder="username" name = "username">
                    </div>
                    <div class="input-group fluid">
                        <label for="pwd" style="width: 180px;">Password</label>
                        <input type="password" value="" id="pwd" placeholder="password" name = "password">
                    </div>
                    <div class="input-group fluid">
                        <label for="pwd" style="width: 180px;">Reinserisci la password</label>
                        <input type="password" value="" id="pwd" placeholder="password" name = "password2">
                    </div>
                    <div class="input-group fluid">
                        <input type="submit" class="primary" value = "Registra">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>

