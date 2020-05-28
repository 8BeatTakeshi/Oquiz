<?php require __DIR__.'/layout/header.php'; ?>

<h3>WWHHHAAATTT ? pas de compte ? Inscrit toi :</h3>

<?php if (!empty($errorList)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errorList as $currentError) : ?>
            <div><?= $currentError ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form class="col" action="<?=route('signup-process')?>" method="POST">
    <label for="firstname">Prénom :</label>
    <input type="firstname" name="first name" id="firstname" value="" placeholder="Rodolphe">
    <br>
    <label for="lastname">Nom :</label>
    <input type="lastname" name="last name" id="lastname" value="" placeholder="WOJTKO">
    <br>
    <label for="pass">Mot de passe :</label>
    <input type="text" name="pass" id="pass"  value="" placeholder="*************">
    <br>
    <label for="pass2">veuillez saisir le mot de passe une deuxième fois :</label>
    <input type="text" name="pass2" id="pass2"  value="" placeholder="*************">
    <br>
    <label for="mail">E-Mail :</label>
    <input type="mail" name="mail" id="mail"  value="" placeholder="rodolphe@rodolphe.com">
    <br>
    <button type="submit">Connexion</button>
</form>

<?php require __DIR__.'/layout/footer.php'; ?>
