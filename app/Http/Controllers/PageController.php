<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Matches;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function admin(){
        $teams = Team::all();

        return view('admin', [
            'teams' => $teams,
        ]);
    }
    public function welcome(){
        $matches = Matches::all()
        ->whereNull('team1_score')
        ->whereNull('team2_score');
        $teams = Team::all();
        return view('welcome', [
            'matches' => $matches,
            'teams' => $teams,
        ]);
    }
}
