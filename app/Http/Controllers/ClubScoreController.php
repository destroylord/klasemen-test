<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubScoreRequest;
use App\Models\Club;
use App\Models\ClubScore;
use Illuminate\Http\Request;

class ClubScoreController extends Controller
{

    public function index() {


        $clubs = Club::orderBy('points', 'desc')->get();
        return view('welcome', compact('clubs'));
    
    }


    public function create() {

        $clubs = Club::all();
        return view('scores.create', compact('clubs'));

    }
    public function store(ClubScoreRequest $request) {

        $homeTeam = Club::findOrFail($request->home_team_id);
        $awayTeam = Club::findOrFail($request->away_team_id);

        $points = $this->calculatePoints($request->home_team_score, $request->away_team_score);

        $homeTeam->addPoints($points['home']);
        $awayTeam->addPoints($points['away']);

        ClubScore::create($request->all());

        return back();
    }


    private function calculatePoints($homeScore, $awayScore)
    {
        if ($homeScore > $awayScore) {
            return ['home' => 3, 'away' => -1];
        } elseif ($homeScore < $awayScore) {
            return ['home' => -1, 'away' => 3];
        } else {
            return ['home' => 1, 'away' => 1];
        }
    }
}
