<!doctype html>
	<html lang="en">
	    <head>
	        <!-- Required meta tags -->
	        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

	        <!-- Reset CSS -->
	        <link href="<?=url('css/reset.css')?>" rel="stylesheet">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	        <!-- Really beautiful CSS -->
	        <link href="<?=url('css/style.css')?>" rel="stylesheet">

	        <!-- Font -->
	        <link href="https://fonts.googleapis.com/css?family=Norican" rel="stylesheet">

            <title>O'Quiz</title>
	    </head>
	    <body class="container">
        <img src="<?=url('css/img/dauphinbackgroundjeanetdario.png')?>" alt="une photo de dauphin" class="dauphin" id="dauphin1">
        <img src="<?=url('css/img/dauphinbackgroundjeanetdario.png')?>" alt="une photo de dauphin" class="dauphin" id="dauphin2">
        <img src="<?=url('css/img/dauphinbackgroundjeanetdario.png')?>" alt="une photo de dauphin" class="dauphin" id="dauphin3">
        <img src="<?=url('css/img/dauphinbackgroundjeanetdario.png')?>" alt="une photo de dauphin" class="dauphin" id="dauphin4">
        <img src="<?=url('css/img/dauphinbackgroundjeanetdario.png')?>" alt="une photo de dauphin" class="dauphin" id="dauphin5">
	        <main class="curseur_img">
                <a href="<?=route('home')?>">
	                <h1 class="title">O'Quiz</h1>
	            </a>

                <?php if(\App\Utils\UserSession::isConnected()): ?>
                <h3>Bienvenue ! <?=\App\Utils\UserSession::getUser()->firstname?> <?=\App\Utils\UserSession::getUser()->lastname?> ! </h3>
                <?php endif; ?>

                <nav class="nav nav-pills nav-fill">

                    <p class="nav-item">
                        <a class="nav-link" href="<?=route('home')?>">Accueil</a>
                    </p>

                    <p class="nav-item">
                        <a class="nav-link" href="<?=route('tags')?>">Par thèmes</a>
                    </p>

                    <?php if(!\App\Utils\UserSession::isConnected()): ?>
                    <p class="nav-item">
                        <a class="nav-link" href="<?=route('signin-form')?>">Connexion</a>
                    </p>
                    <?php endif; ?>

                    <?php if(!\App\Utils\UserSession::isConnected()): ?>
                    <p class="nav-item">
                        <a class="nav-link" href="<?=route('signup-form')?>">Inscription</a>
                    </p>
                    <?php endif; ?>

                    <?php if(\App\Utils\UserSession::isConnected()): ?>
                    <p class="nav-item">
                        <a class="nav-link" href="<?=route('account')?>">Mon compte</a>
                    </p>
                    <?php endif; ?>

                    <?php if(\App\Utils\UserSession::isConnected()): ?>
                    <p class="nav-item">
                        <a class="nav-link" href="<?=route('logout')?>">Déconnection</a>
                    </p>
                    <?php endif; ?>

                </nav>
