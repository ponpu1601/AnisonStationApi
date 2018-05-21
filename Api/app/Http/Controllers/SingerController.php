<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Singer;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function show(Request $request)
    {
        if ($request->has('name'))
        {
            $singers=$this->fetchByParticalMatchTitle($request->input('name'));
            return $this->respondWithJson($singers);
        }
	    else
        {
            return 'RequestedUrl has to include the \'name\' parameter.';
        }
    }

    public function fetchByParticalMatchTitle($name)
    {
        return Singer::where('name','LIKE',"%$name%")
                ->take(10000)
                ->get();
    }

    public function showOne($id)
    {
        $singer=Singer::with('songs')
                  ->find($id);
                  
        return $this->respondWithJson($singer);
    }
    


}
