<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table ='commentaire';
    protected $primaryKey = 'titre';
    public $timestamps = true;

    public function utilisateur() {
        return $this->belongsTo('games\model\Utilisateur', 'email_utilisateur');
    }

    public function game() {
        return $this->belongsTo('games\model\Game', 'game_id');
    }
}