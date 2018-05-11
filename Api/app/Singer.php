<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model 
{
    
    protected $table = 'singers';

    public $timestamps = false;

    protected $hidden = array('created_at','updated_at');
}
