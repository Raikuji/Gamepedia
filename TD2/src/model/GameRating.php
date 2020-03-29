<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class GameRating extends Model{

    protected $table = 'game_rating';
    protected $primaryKey = 'id';
    public $timestamps = false ;

    public function games()
    {
        return $this->belongsToMany('games\model\Game', 'game2rating', 'game_id', 'rating_id');
    }

    public function ratingboard() 
    {
        return $this->belongsTo('games\model\RatingBoard');
    }
 
}