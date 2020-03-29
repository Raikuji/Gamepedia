<?php


namespace games\model;


use Illuminate\Database\Eloquent\Model;

class Genre extends Model{

    protected $table = 'genre';
    protected $primaryKey = 'id';
    public $timestamps = false ;
}