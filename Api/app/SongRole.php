<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class SongRple extends Model 
{
    
    protected $table = 'song_roles';

    public $timestamps = false;

    protected $hidden = array('created_at','updated_at');

}
