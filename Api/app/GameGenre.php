<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameGenre extends Model 
{

    protected $table = 'game_genres';

    protected $hidden = array('created_at','updated_at');

    public $timestamps = false;

}
