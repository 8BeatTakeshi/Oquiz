<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


// MainController
$router->get('/',['as' => 'home',
'uses' => 'MainController@home']);


// UserController
$router->get('/signup', [
    'as' => 'signup-form',
    'uses' => 'UserController@signup'
]);

$router->post('/signup/process', [
    'as' => 'signup-process',
    'uses' => 'UserController@signupPost'
]);

$router->get('/signin', [
    'as' => 'signin-form',
    'uses' => 'UserController@signin'
]);

$router->post('/signin', [
    'as' => 'signin-process',
    'uses' => 'UserController@signinPost'
]);

$router->get('/logout', [
    'as' => 'logout',
    'uses' => 'UserController@logoutAction'
]);

$router->get('/account', [
    'as' => 'account',
    'uses' => 'UserController@account'
]);


// QuizController
$router->get('/quiz/{id}', [
    'as' => 'quiz',
    'uses' => 'QuizController@quiz'
]);


// Affichage des résultats du quiz
$router->post('/result/{id}', [
    'as' => 'result',
    'uses' => 'QuizController@result'
]);


// TagController
$router->get('/tags', [
    'as'=> 'tags',
    'uses'=> 'TagController@tags'
]);

$router->get('/tags/{id}/quiz', [
    'as' => 'tags-id',
    'uses' => 'TagController@quiz'
]);

