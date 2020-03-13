<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class GameRating extends Model{

    protected $table = 'game_rating';
    protected $primaryKey = 'id';
    public $timestamps = false ;

    public function games()
    {
        return $this->belongsToMany('games\model\Game', 'game2rating', 'rating_id', 'game_id');
    }

    public function ratingboard() 
    {
        return $this->belongsTo('games\model\RatingBoard');
    }
 
}