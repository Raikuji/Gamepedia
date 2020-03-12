<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Company extends Model{

    protected $table = 'Company';
    protected $primaryKey = 'id';
    public $timestamps = false ;

    public function games()
    {
        return $this->belongsToMany('games\model\Game', 'game_developers', 'comp_id', 'game_id');
    }

}