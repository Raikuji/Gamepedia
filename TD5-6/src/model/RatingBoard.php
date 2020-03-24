<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class RatingBoard extends Model {

    protected $table = 'rating_board';
    protected $primaryKey = 'id';
    public $timestamps = false ;

    public function ratings() 
    {
        return $this->hasMany('games\model\GameRating');
    }
}