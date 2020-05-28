<?php require __DIR__.'/layout/header.php'; ?>

    <h3>Mon compte</h3>
    <div>
    <p>Prénom : <?=\App\Utils\UserSession::getUser()->firstname?></p>
    </div>
    <div>
    <p>Nom : <?=\App\Utils\UserSession::getUser()->lastname?></p>
    </div>
    <div>
    <p>E-mail : <?=\App\Utils\UserSession::getUser()->email?></p>
    </div>
    <div>
    <p>Statut : <?=\App\Utils\UserSession::getUser()->status?></p>
    </div>

<?php require __DIR__.'/layout/footer.php'; ?>
