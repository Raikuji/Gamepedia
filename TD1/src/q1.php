<?php
namespace games ;


use \games\model\Game ;
use \games\model\Company;
use \games\model\Platform;

class q1
{

    public function donneMario()
    {
        $Marios = Game::where('name', 'like', '%mario%')->get();

        foreach ($Marios as $mar) {
            echo "nom : " . $mar->name . " alias : " . $mar->alias;
        }

    }

    public function installeJapon()
    {
        $comp = Company::where('location_country', 'like', '%Japan%')->get();
        foreach ($comp as $cp) {
            echo " nom : " . $cp->name . " pays : " . $cp->location_country;
        }
    }

    public function baseInstalle()
    {
        $plat = Platform::where('install_base', '>=', '10000000')->get();
        foreach ($plat as $pl) {
            echo "*nom : " . $pl->name . ' - ' . $pl->install_base . "   ";
        }
    }

    public function afficheJeuOrdre(){
        $lis = array();
        $val = 21173+442 ;
        $i = 21173 ;
            while($i < $val){
                $jeu = Game::where('id', '=', $i )->first();
                $lis[] = $jeu;
                $i++ ;
            }

        foreach($lis as $l){
            echo '* '. $l->name ;
        }
    }

    public function JeuPagine(){
        $jeu = Game::where('id','<=','4000')->get();
        $i = 0 ;
        $npage = 1 ;
        foreach($jeu as $j){
          if($i == 500){
              echo '<br>/////////////////////////<br>//////////' . $npage . '///////////// <br>////////////////////////<br><br>' ;
              $i = 0 ;
              $npage++ ;
          }else{
              echo $j->id . ' - ' . $j->name . $j->deck . "<br>" ;
              $i++ ;
          }

        }
    }

}