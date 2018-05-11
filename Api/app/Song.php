<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Song extends Model 
{
    
    protected $table = 'songs';

    public $timestamps = false;

    public function scopeRecent($query)
    {
	return $query->orderBy('anisoninfo_song_id','desc')
                    ->take(200);
    }

    public function singer()
    {
	return $this->belongsTo('App\Singer','singer_id','id');
    }

    public function song_role()
    {
	return $this->belongsTo('App\SongRole','song_role_id','id');
    }

    public function program()
    {
	return $this->belongsTo('App\Program','program_id','id');
    }

}
