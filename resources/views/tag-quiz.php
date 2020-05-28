<?php require __DIR__.'/layout/header.php'; ?>

<h3>Tous les quiz disponibles pour la catégorie <?= $tag->name?> :</h3>


<div class="container-fluid">
    <div class="row">
    <?php foreach ($tag->quiz as $currentQuiz): ?>
        <a href="<?=route('quiz', ['id' => $currentQuiz->id])?>" class="card m-4 p-4">
        <div>
            <h3><?= $currentQuiz->title?></h3>
            <h5><?= $currentQuiz->description?></h5>
            <p>by <?=$currentQuiz->author->firstname.' '.$currentQuiz->author->lastname;?></p>
        </div>
        </a>
    <?php endforeach; ?>
    </div>
</div>

<a href="<?php route('home')?>">accueil</a>

<?php require __DIR__.'/layout/footer.php'; ?>




