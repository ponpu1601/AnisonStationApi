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

$router->get('/', function () use ($router) {
    $readme = file_get_contents(__DIR__.'../../resources/specification/ApiSpecification.md');
    $parser = new \cebe\markdown\GithubMarkdown();
    echo $parser->parse($readme);
});

//$router->get('/info', 'PhpInfoController@show');

$router->get('/programs/tvanimes/{year}','TvAnimeController@showByYear');

$router->get('/programs/tvanimes/{year}/{season_id}','TvAnimeController@showByCour');

$router->get('/programs', 'ProgramController@show');

$router->get('/programs/{id}', 'ProgramController@showOne');

$router->get('/songs', 'SongController@show');

$router->get('/songs/{id}', 'SongController@showOne');

