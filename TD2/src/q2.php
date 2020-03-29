<?php
namespace games ;


use games\model\Character;
use \games\model\Game ;
use \games\model\Company;
use \games\model\Platform;

class q2
{

    public function afficherNameDeck()
    {
        $jeu = Game::where('id', '=', 12342)->first()->characters()->select('name', 'deck')->get();
        echo $jeu;
        // $personnages = Character::select('name', 'deck')->where();
    }

    public function persoJeuxMario()
    {
        $jeux = Game::where('name', 'like', 'Mario%')->get();
        foreach ($jeux as $jeu) {
            $personnages = $jeu->characters()->select('name', 'deck')->get();
            foreach ($personnages as $personnage) {
                echo $personnage . "<br>";
            }
        }
    }

    public function jeuxSony()
    {
        $companies = Company::where('name', 'like', '%Sony%')->get();
        foreach ($companies as $company) {
            $games = $company->games()->get();
            foreach ($games as $game) {
                echo $game->name;
                echo '<br>';
            }
        }
    }

    public function ratingMario() {
        $games = Game::where('name', 'like', '%Mario%')->get();
        foreach ($games as $game) {
            $rates = $game->ratings;
            echo $game->name . ': ';
            foreach ($rates as $rate) {
                echo $rate->rating_board_id;
                echo ' ';
            }
            echo '<br>';
        }
    }

    public function marioMore3Chars() {
        $games = Game::where('name', 'like', 'Mario%')->get();
        foreach ($games as $game) {
            if($game->characters()->count() >= 3){
                echo $game->name . '<br>';
            }
        }
    }

    public function marioPEGI3() {
        $games = Game::where('name', 'like', 'Mario%')->get();
        foreach ($games as $game) {
            $rates = $game->ratings;
            foreach ($rates as $rate) {
                if(strpos($rate->name, '3+')) {
                    echo $game->name . '<br>';
                }
            }
        }
    }
    
    public function marioInc3() {
        $games = Game::where('name', 'like', 'Mario%')->get();
        foreach ($games as $game) {
            $publishers = $game->publishers;
            foreach ($publishers as $publisher) {
                if(strpos($publisher->name, 'Inc.')) {
                    $rates = $game->ratings;
                    foreach ($rates as $rate) {
                        if(strpos($rate->name, '3+')) {
                            echo $game->name . '<br>';
                        }
                    }
                }
            }
        }
    }

    public function CEROMario() {
        $games = Game::where('name', 'like', 'Mario%')->get();
        foreach ($games as $game) {
            $publishers = $game->publishers;
            foreach ($publishers as $publisher) {
                if(strpos($publisher->name, 'Inc.')) {
                    $rates = $game->ratings;
                    foreach ($rates as $rate) {
                        if(strpos($rate->name, '3+') && strpos($rate->name, 'CERO')) {
                            echo $game->name . '<br>';
                        }
                    }
                }
            }
        }
    }

    public function newType() {
        $genre = new Genre();
        $genre->name = 'genre1';
        $genre->deck = 'deck du genre1';
        $genre->description = 'desc';
        $genre->save();
    }

}