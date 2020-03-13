<?php
namespace games ;


use games\model\Character;
use \games\model\Game ;
use \games\model\GameRating ;
use \games\model\Company;
use \games\model\Platform;

class q3
{

    public function timeQueryGames()
    {
        $time_start = microtime(true);
        $lis = array();
        $val = 500;
        $i = 0;
        while($i < Game::count()) {
            while($i < $val){
                $jeu = Game::where('id', '=', $i )->first();
                $lis[] = $jeu;
                $i++ ;
            }

            foreach($lis as $l){
                echo ' '. $l->name;
            }

            $val += $i;
        }
        $elapsed_time = microtime(true) - $time_start;
        echo "Temps écoulé : " . $elapsed_time . " secondes.";
    }

    public function timeMarioQuery() {
        $time_start = microtime(true);
        $jeux = Game::where('name', 'like', '%Mario%')->get();
        foreach ($jeux as $jeu) {
            echo $jeu->name . '<br>';
        }
        $elapsed_time = microtime(true) - $time_start;
        echo "Temps écoulé : " . $elapsed_time . " secondes.";
    }


    public function timeMarioCharQuery() {
        $time_start = microtime(true);
        $jeux = Game::where('name', 'like', 'Mario%')->get();
        foreach ($jeux as $jeu) {
            $personnages = $jeu->characters()->select('name', 'deck')->get();
            foreach ($personnages as $personnage) {
                echo $personnage . "<br>";
            }
        }
        $elapsed_time = microtime(true) - $time_start;
        echo "Temps écoulé : " . $elapsed_time . " secondes.";
    }

    public function timeMarioRatingPlus3() {
        $time_start = microtime(true);
        $jeux = Game::where('name', 'like', 'Mario%')->get();
        $ratings = GameRating::where('name', 'like', '%3+%')->get();
        foreach ($ratings as $rating) {
            $games = $rating->games()->select('name')->where('name', 'like', '%Mario')->get();
            foreach ($games as $game) {
                echo $game->name . '<br>';
            }
        }
        $elapsed_time = microtime(true) - $time_start;
        echo "Temps écoulé : " . $elapsed_time . " secondes.";
    }


    // Questions sur les index

    public function whereQuery1() {
        $time_start = microtime(true);
        $jeux = Game::where('name', 'like', 'Mario%')->get();
        $elapsed_time = microtime(true) - $time_start;
        echo "Temps écoulé : " . $elapsed_time . " secondes.";
    }

    public function whereQuery2() {
        $time_start = microtime(true);
        $jeux = Game::where('name', 'like', 'G%')->get();
        $elapsed_time = microtime(true) - $time_start;
        echo "Temps écoulé : " . $elapsed_time . " secondes.";
    }

    public function whereQuery3() {
        $time_start = microtime(true);
        $jeux = Game::where('name', 'like', '%lu%')->get();
        $elapsed_time = microtime(true) - $time_start;
        echo "Temps écoulé : " . $elapsed_time . " secondes.";
    }
}