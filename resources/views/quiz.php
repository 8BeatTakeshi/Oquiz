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

<form>
    <section class="questions">
    <?php foreach ($quiz->questions as $question): ?>
    <article class="question card m-4 p-4 level--<?=$question->level->id?>">
        <h4><?=$question->question?> (<?=$question->level->name?>)</h3>
        <p><?=$question->anecdote?></p>



    </article>
    <?php endforeach; ?>
    </section>

</form>
<?php require __DIR__.'/layout/footer.php'; ?>
