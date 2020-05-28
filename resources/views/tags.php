<?php require __DIR__.'/layout/header.php'; ?>

<h3>Tous les sujets dispo :</h3>

<?php foreach ($tags as $currentTag) : ?>
    <a  id="thematique" class="btn btn-primary m-4" role="button" href="<?=route('tags-id', ['id' => $currentTag->id])?>"><?= $currentTag->name ?></a>
<?php endforeach ?>



<?php require __DIR__.'/layout/footer.php'; ?>


<!-- ('tags-id', ['id' => $tag->id]) :
où tags-id => nom de la route
id => partie dynamique de la route (cf routes/web.php) {id}
$tag=>id =>id du currentTag dans la boucle foreach  -->
