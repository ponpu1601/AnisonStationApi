<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class SongRole extends Model 
{
    
    protected $table = 'song_roles';

    public $timestamps = false;

    protected $hidden = array('created_at','updated_at');

}
