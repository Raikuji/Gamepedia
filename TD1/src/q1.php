<?php
namespace games ;


use \games\model\Game ;
use \games\model\Company;
use \games\model\Platform;

class q1{

    public function donneMario(){
        $Marios = Game::where('name','like','%mario%')->get();

        foreach ($Marios as $mar){
            echo "nom : " . $mar->name . " alias : " . $mar->alias;
        }

    }
}
