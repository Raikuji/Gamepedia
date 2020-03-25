<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table ='character';
    protected $primaryKey = 'id';
    protected $hidden = array('pivot');

    public function games() {
        return $this->belongsToMany('games\model\Game', 'game2character', 'character_id', 'game_id');
    }
}