<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Song;
use App\ProgramType;
use App\GameGenre;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function show(Request $request)
    {
        if ($request->has('title'))
        {
            $songs=$this->fetchByParticalMatchTitle($request->input('title'));
            return $this->respondWithJson($songs);
        }
	    else
        {
            $songs=$this->fetchRecentSongs();
            return $this->respondWithJson($songs);
        }
    }

    public function fetchRecentSongs()
    {
        return Song::recent()
                ->with('program','song_role','singer')
                ->get();
    }

    public function fetchByParticalMatchTitle($title)
    {
        return Song::with('program','song_role','singer')
                ->where('title','LIKE',"%$title%")
                ->take(10000)
                ->get(); 
    }

    public function showOne($id)
    {
        $song=Song::with('program','song_role','singer')
                  ->where('id',$id)
                  ->get();
                  
        return $this->respondWithJson($song);
    }
    


}
