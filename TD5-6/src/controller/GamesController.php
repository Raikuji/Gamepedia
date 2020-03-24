<?php


namespace games\controller;


use games\model\Game;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Slim\Slim;

class GamesController
{
    public function getGame($id) {
        $app = Slim::getInstance();
        try {
            $r = Game::where("id", '=', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $app->response->setStatus(404);
        }
        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');
        echo json_encode($r);
    }

    public function getGames() {
        $app = Slim::getInstance();

        if ($app->request->params('page') > 0) {
            $page = $app->request->params('page');
        } else {
            $page = 1;
        }

        $taille = 200;
        $nbr_games = Game::count();
        $last = intval($nbr_games/$taille)+1;
        $prev=(($page-1 > 0) ? $page-1 : 1);
        $next=(($page+1>$last)?$last:$page+1);

        $games = Game::select('id','name', 'alias', 'deck')->skip(($page*$taille)-200)->take($taille)->get();
        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');
        $games_data = [];
        foreach ($games as $game) {
            array_push($games_data, [
                'game' => $game->toArray(),
                'links' => ['self'=>['href' => $app->urlFor('game', ['id'=>$game->id])]]
            ]);
        }
        echo json_encode(['games'=> $games_data,
            'links' => [
                'first' => ['href'=>$app->urlFor('games').'?page=1'],
                'prev' => ['href'=>$app->urlFor('games').'?page='.$prev],
                'next' => ['href'=>$app->urlFor('games').'?page='.$next],
                'last' => ['href'=>$app->urlFor('games').'?page='.$last]
            ]]);
    }

    public function getComms($id) {
        $app = Slim::getInstance();
        try {
            $commentaires = Game::where('id', '=', $id)->firstOrFail()->commentaires;
        } catch (ModelNotFoundException $e) {
            $app->response->setStatus(404);
        }

        $app->response->setStatus(200);
        $app->response->headers->set('Content-Type', 'application/json');
        $commentaires_array = [];

        foreach ($commentaires as $comm){
            array_push($commentaires_array, $comm);
        }

        echo json_encode($commentaires_array);
    }

}