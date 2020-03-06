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
        //echo Company::where('name', 'like', '%Sony%')->select('name')->first()->games();
/*        $sonies = Company::where('name', 'like', '%Sony%')->get();
        foreach ($sonies as $sony) {
            echo $sony->select('name')->get() . "<br>";
        }*/
    }



}