<?php

// On calcul le score du joueur en comparant l'id de la question à l'id de la réponse
$score = 0;
foreach ($playerAnswers as $questionId => $playerAnswer) {
    if ($questionId == $playerAnswer) {
        $score ++;
    }
}

// On fabrique un nouveau tableau qui affiche pour chaque question "bonne" ou "mauvaise" pour gérer du css en fonction de la réponse du joueur
$newPlayerAnswers = [];
foreach ($playerAnswers as $questionId => $playerAnswer) {
    $reponse = "";
    if ($questionId == $playerAnswer) {
        $reponse = "bonne";
    } else {
        $reponse = "mauvaise";

    }

    $newPlayerAnswers[$questionId] = $reponse;
}

// On compte le nombre de ligne dans le tableau pour de /.. de la note
$surNote = count($playerAnswers);

// On calcul la moyenne pour afficher un message perso en fonction du niveau du joueur
$moyenne = $score/$surNote;
?>

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

<!-- On affiche juste le score du joueur -->
<h4>Votre note : <?= $score?> / <?= $surNote?></h4>

<!-- En fonction de la moyenne du joueur on lui affiche un message perso -->
<?php
if ($moyenne < 0.5){
    echo 'Grosse merde !';
} elseif ($moyenne == 0.5){
    echo 'Ca va peut mieux faire ...';
} elseif ($moyenne < 0.9) {
    echo 'BBIIIEEEENNN !!';
} elseif ($moyenne == 1) {
    echo 'U\'r the best ! &#128525;';
}
?>

<!-- On génére le questionnaire -->
<form>
    <section class="questions">
    <!-- Comme dans quizConsult on génére les questions du quiz -->
    <?php foreach ($quiz->questions as $question): ?>
    <!-- Dans la class de la carte de question on ajoute "bonne" ou "mauvaise" pour généré la bonne bordure en CSS-->
    <article class="question card m-4 p-4 <?php if ($newPlayerAnswers[$question->id] == "bonne") {
                echo "green";
            } else {
                echo "red";
            } ?>">
        <!-- affichage de la question et du level de la question -->
        <h4><?=$question->question?> (<?=$question->level->name?>)</h3>
        <!-- affichage de l'annecdote de la question -->
        <p><?=$question->anecdote?></p>

        <!-- Comme pour quizConsult on génére toutes les réponses possibles pour la question -->
        <?php foreach ($question->answers as $answer) : ?>
            <div class="question__choices">
                <div>
                    <!-- Pour re cocher la réponse que l'utilisateur a choisi, on utilise le tableau des réponses puis on echo 'checked' dans les caractéristiques du bouton radio -->
                    <input type="radio" name="<?= $question->id ?>" id="<?= $question->id ?>" value="option<?= $answer->id ?>"
                    <?php if ($playerAnswers[$question->id] == $answer->id) echo 'checked' ?>>
                    <label for="<?= $question->id ?>">
                            <?= $answer->description ?>
                    </label>
                </div>
            </div>
        <?php endforeach; ?>

    </article>
    <?php endforeach; ?>
    </section>

</form>
<?php require __DIR__.'/layout/footer.php'; ?>





