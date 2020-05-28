<?php require __DIR__.'/layout/header.php'; ?>
<header>
    <h2><?=$quiz->title?></h2>
    <p>by <?=$quiz->author->firstname.' '.$quiz->author->lastname;?></p>
    <ul class="topics">
    <?php foreach ($quiz->topics as $tag): ?>
        <li class="btn btn-outline-light"><?=$tag->name?></li>
    <?php endforeach; ?>
    </ul>
</header>

<form action="<?=route('result', ['id' => $quiz->id])?>" method="post">
    <section class="questions">

    <!-- Création d'un foreach pour boucler sur toutes les questions d'un quiz -->
    <!-- Pour chaques questions on affiche la question ($question->question), l'annecdote($question->annecdote), ... -->
    <?php foreach ($quiz->questions as $question): ?>
    <article class="question card m-4 p-4 level--<?=$question->level->id?>">
        <h4><?=$question->question?> (<?=$question->level->name?>)</h3>

        <!-- Pour chaque question d'un quiz, on va boucler sur toutes les réponses possible de cette question -->
        <?php foreach ($question->answers as $answer) : ?>
            <div class="question__choices">
                <div>
                    <!-- Pour chaque réponses possible a une question on lui donne un name qui correcpond a l'id de la question en cours puis une value qui correspond à l'id de la réponse ($answer) -->
                    <input type="radio" name="<?= $question->id ?>" id="<?= $question->id ?>" value="<?= $answer->id ?>" required>
                    <label for="<?= $question->id ?>">
                            <?= $answer->description ?>
                    </label>
                </div>
            </div>
        <?php endforeach; ?>



    </article>
    <?php endforeach; ?>
    </section>

    <div>
        <input class="btn btn-primary m-4" id="validerQuiz" type="submit" value="OK"/>
    </div>

</form>
<?php require __DIR__.'/layout/footer.php'; ?>
