<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Program extends Model 
{
    
    protected $table = 'programs';

    protected $hidden = ['game_genre_id','program_type_id','created_at','updated_at'];

    public $timestamps = false;

    public function scopeRecent($query)
    {
        return $query->orderBy('anisoninfo_program_id','desc')
                    ->take(200);
    }

    public function game_genre()
    {
        return $this->belongsTo('App\GameGenre','game_genre_id','id');
    }

    public function program_type()
    {
    	return $this->belongsTo('App\ProgramType','program_type_id','id');
    }
    
    public function songs()
    {
	    return $this->hasMany('App\Song','program_id','id')->with('song_role','singer');
    }

}
