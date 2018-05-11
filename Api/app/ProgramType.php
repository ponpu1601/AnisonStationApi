<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramType extends Model 
{
    
    protected $table = 'program_types';

    protected $hidden = array('created_at','updated_at');

    public $timestamps = false;

}
