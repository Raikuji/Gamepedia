<?php

use games\controller\GamesController;
use Slim\Slim;

require 'vendor/autoload.php';

\games\AppConf::addDbConf('./config/conf.ini');

$app = new Slim();

$app->get('/api/games/:id', function($id) {
    (new GamesController())->getGame($id);
})->name('game');

$app->get('/api/games', function() {
    (new GamesController())->getGames();
})->name('games');

$app->get('/', function() {
    echo 'here 1';
});

$app->get('/api/games/:id/comments', function($id){
    (new GamesController())->getComms($id);
})->name('comments');

$app->get('/api/games/:id/characters', function($id){
    (new GamesController())->getGameChars($id);
})->name('charactersGame');

$app->get('/api/characters/:id', function($id){
    (new GamesController())->getChars($id);
})->name('characters');

$app->post('/api/games/:id/comments', function($id) use ($app) {
    (new GamesController())->postComments($id, $app->request->getBody());
});


$app->run();
