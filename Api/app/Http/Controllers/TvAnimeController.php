<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use App\Program;
use App\ProgramType;
use App\GameGenre;
use Illuminate\Http\Request;

class TvAnimeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showByYear($year)
    {
        
        $from = $year.'-01-01';
        $to = $year.'-12-31';
        $programs=$this->fetchByBroadcastOnRange($from,$to);
        return $this->respondWithJson($programs);
    }

    public function showByCour($year,$season_id)
    {
        $season_range = $this->convertToSeasonRange($season_id);
        
        if ($season_range['from'] =='')
        {
            echo 'invalid season_id';
            return;
        }

        $from = $year.$season_range['from'];
        echo ($from);
        $to = $year.$season_range['to'];
        echo ($to);
        $programs=$this->fetchByBroadcastOnRange($from,$to);
        return $this->respondWithJson($programs);
    }
    
    public function fetchByBroadcastOnRange($from,$to)
    {
        return Program::with('program_type')
                ->where('program_type_id',2)
                ->whereBetween('broadcast_start_on',[$from,$to])
                ->get();
    }

    public function convertToSeasonRange($season_id)
    {
        $from = '';
        $to = '';
        switch ($season_id)
        {
            case 1:
                $from='-01-01';
                $to = '-03-15';
                break;
            case 2:
                $from='-03-16';
                $to='-06-15';
                break;
            case 3:
                $from='-06-16';
                $to='-09-15';
                break;
            case 4:
                $from='-09-16';
                $to='-12-31';
                break;
        }

        return [
            'from'=>$from,
            'to'=>$to
        ];
    }


}
