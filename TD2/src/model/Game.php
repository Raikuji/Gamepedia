<?php

namespace games\model;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    protected $table = 'Game';
    protected $primaryKey = 'id';
    public $timestamps = false ;

    public function characters() {
        return $this->belongsToMany('games\model\Character', 'game2character', 'game_id', 'character_id');
    }

    public function companies()
    {
        return $this->belongsToMany('games\models\Company', 'game_developpers', 'game_id', 'comp_id');
    }

    public function ratings()
    {
        return $this->belongsToMany('games\model\GameRating', 'game2rating', 'game_id', 'rating_id');
    }

    public function publishers()
    {
        return $this->belongsToMany('games\model\Company', 'game_publishers', 'game_id', 'comp_id');
    }

}