<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model 
{
    
    protected $table = 'singers';

    public $timestamps = false;

    protected $hidden = array('created_at','updated_at');

    public function songs()
    {
	    return $this->hasMany('App\Song','singer_id','id')->with('song_role','program');
    }
}
