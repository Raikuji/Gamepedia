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
            echo $game->games;
        }
    }

}