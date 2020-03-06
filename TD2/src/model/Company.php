<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Company extends Model{

    protected $table = 'Company';
    protected $primaryKey = 'id';
    public $timestamps = false ;

    public function games()
    {
        return $this->belongsToMany('games\models\Game', 'game_developpers', 'comp_id', 'game_id');
    }

}