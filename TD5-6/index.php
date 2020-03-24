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

$app->get('/api/game/:id/comments', function($id){
    (new GamesController())->getComms($id);
});

$app->run();
