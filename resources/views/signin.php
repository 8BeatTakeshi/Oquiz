<?php require __DIR__.'/layout/header.php'; ?>

<h3>Connecte toi S'IL TE PLAIT !!!</h3>

<form class="col" action="<?=route('signin-process')?>" method="POST">
    <label for="mail">E-mail :</label>
    <input type="mail" name="mail" id="mail" value="" placeholder="quelquechose@untruc.froucomom">
    <br>
    <label for="pass">Password :</label>
    <input type="pass" name="pass" id="pass" value="" placeholder="*************">
    <br>
    <button type="submit">Connexion</button>
</form>

<?php require __DIR__.'/layout/footer.php'; ?>

