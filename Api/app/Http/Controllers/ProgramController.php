<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Program;
use App\ProgramType;
use App\GameGenre;
use Illuminate\Http\Request;

class ProgramController extends Controller
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
            $programs=$this->fetchByParticalMatchTitle($request->input('title'));
            return $this->respondWithJson($programs);
         }
	 else
         {
            $programs=$this->fetchRecentPrograms();
            return $this->respondWithJson($programs);
         }
    }

    public function fetchRecentPrograms()
    {
        return Program::recent()
                   ->with('program_type','game_genre')
                   ->get();
    }

    public function fetchByParticalMatchTitle($title)
    {
        return Program::with('program_type','game_genre')
                   ->where(function($query) use ($title)
                     {
                       $query->orWhere('title','LIKE',"%$title%")
                             ->orWhere('kana_title','LIKE',"%$title%")
                             ->orWhere('other_title_01','LIKE',"%$title%")
                             ->orWhere('other_title_02','LIKE',"%$title%");
                   })->get(); 
    }

    public function showOne($id)
    {
        $programs=Program::with('songs','program_type','game_genre')
                   ->where('id',$id)
                   ->get();

        return $this->respondWithJson($programs);
    }
    


}
