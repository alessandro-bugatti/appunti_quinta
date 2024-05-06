<?php
/**
 * @var $sent
 */

?>

<?php $this->layout('home', ['titolo' => 'Esempio invio email']) ?>

<h1>Invia un'email</h1>
<?php if($sent !== null):?>
    <?php if($sent == true):?>
    <div class="toast toast-success">
        Invio riuscito.
    </div>
    <?php else:?>
    <div class="toast toast-error">
        Invio fallito.
    </div>
    <?php endif?>
<?php endif; ?>
<div>
    <form class="form" action="index.php" method="post">
        <div class="form-group">
            <label class="form-label" for="to">To</label>
            <input class="form-input" type="text" id="to" placeholder="Send to" name="to">
        </div>
        <div class="form-group">
            <label class="form-label" for="subject">Subject</label>
            <input class="form-input" type="text" id="subject" placeholder="Your subject" name="subject">
        </div>
        <div class="form-group">
            <label class="form-label" for="message">Message</label>
            <textarea class="form-input" id="message" placeholder="Your message" rows="6" name="message"></textarea>
        </div>
        <div class="">
            <input class="btn btn-primary" type="submit" value="Send">
        </div>
    </form>
</div>

