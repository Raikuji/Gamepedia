<?php
namespace games;


use \games\model\Character;
use \games\model\Game ;
use \games\model\GameRating ;
use \games\model\Company;
use \games\model\Platform;
use \games\model\Utilisateur;
use \games\model\Commentaire;

use \Faker\Factory;

class q4
{

    public function setupUsersComs()
    {
        $u1 = new Utilisateur;
        $u1->email = "test1@test.com";
        $u1->nom = "testN1";
        $u1->prenom = "TestP1";
        $u1->adresse = "3 Rue de test 1";
        $u1->datenaiss = "2000-12-17";
        $u1->tel = "0652541254";
        $u1->save();

        $u2 = new Utilisateur;
        $u2->email = "test2@test.com";
        $u2->nom = "testN2";
        $u2->prenom = "TestP2";
        $u2->adresse = "3 Rue de test 2";
        $u2->datenaiss = "2001-12-17";
        $u1->tel = "06527481254";
        $u2->save();

        $c1 = new Commentaire;
        $c1->titre = "LoremIpsum1";
        $c1->contenu = "LoremIpsum";
        $c1->game_id = 12342;
        $c1->email_utilisateur = "test1@test.com";
        $c1->save();

        $c2 = new Commentaire;
        $c2->titre = "LoremIpsum2";
        $c2->contenu = "LoremIpsum";
        $c2->game_id = 12342;
        $c2->email_utilisateur = "test2@test.com";
        $c2->save();

        $c3 = new Commentaire;
        $c3->titre = "LoremIpsum3";
        $c3->contenu = "LoremIpsum";
        $c3->game_id = 12342;
        $c3->email_utilisateur = "test1@test.com";
        $c3->save();

        echo "Done!";
    }


    public function autogen() {

        $faker = Factory::create();

        for($i= 0; $i < 25000; $i++) {
            $u = new Utilisateur;
            $fakeemail = $faker->email;

            // $faker->email peut generer deux fois la meme, incompatible avec la clé primaire, donc on check avec un while

            while(Utilisateur::where('email', $fakeemail)->exists()) { 
                $fakeemail = $faker->email;
            }
            $u->email = $fakeemail; 
            $u->nom = $faker->lastName;
            $u->prenom = $faker->firstName;
            $u->adresse = $faker->address;
            $u->datenaiss = $faker->date($format = 'Y-m-d', $max = 'now');
            $u->tel = $faker->phoneNumber;
            $u->save();
        } 

    
        for ($j = 0; $j < 250000; $j++) {
            $c = new Commentaire;
            $c->titre = $faker->text($maxNbChars = 128);
            $c->contenu = $faker->text($maxNbChars = 1000);
            $c->game_id = Game::inRandomOrder()->first()->id;
            $c->email_utilisateur = Utilisateur::inRandomOrder()->first()->email;
            $c->save();
        }

        echo "Done!";
    }
}