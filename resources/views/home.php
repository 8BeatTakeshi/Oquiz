<?php require __DIR__.'/layout/header.php'; ?>

	<div>
			<h2> Bienvenue sur O'Quiz </h2>
			<p>
			Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
			</p>
		</div>


		<div class="container-fluid">
            <div class="row">
                <?php foreach ($quizzes as $quiz): ?>
                <a href="<?=route('quiz', ['id' => $quiz->id])?>" class="card m-4 p-4">
                <div>
                    <h3><?= $quiz->title?></h3>
                    <h5><?= $quiz->description?></h5>
                    <p>by <?=$quiz->author->firstname.' '.$quiz->author->lastname;?></p>
                </div>
                </a>
                <?php endforeach; ?>
            </div>
		</div>


	<?php require __DIR__.'/layout/footer.php'; ?>
