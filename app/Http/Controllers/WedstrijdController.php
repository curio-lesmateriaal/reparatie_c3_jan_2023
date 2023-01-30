<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\matches;

class WedstrijdController extends Controller
{
    // index pagina naar de wedstrijden
    public function index()
    {
        // get all matches
        $matches = Matches::all();
        // return view with the matches
        return view('teams.wedstrijden', [
            'matches' => $matches
        ]);
    }
    // generate matches
    public function generate(Request $request)
    {
        // REPARATIEOPDRACHT HIER UITVOEREN

        // Programmeer het volgende:
        // 1. Haal alle matches die al in de database staan uit de database
        // 2. Zorg ervoor dat er een match wordt gegenereerd voor elke combinatie van teams
        // 2.1. Zorg ervoor dat er geen match wordt gegenereerd voor een team tegen zichzelf
        // 2.2. Zorg ervoor dat er geen match wordt gegenereerd voor een team dat al een match heeft
        // 3. Zorg ervoor dat er een tijd wordt gekozen die voor beide teams beschikbaar is
        // 4. Zorg ervoor dat er een veld wordt gekozen die op die tijd beschikbaar is.
        // 5. Zorg ervoor dat er een scheidsrechter wordt gekozen die op die tijd beschikbaar is.
        // 6. Sla de match op in de database
        // 7. Herhaal dit voor elke combinatie van teams
        // Let erop dat de mogelijke tijden bepaald worden door het forumulier in /resources/views/teams/wedstrijden.blade.php:23
        // Je kunt de seeder gebruiken om alvast teams in te laden in de database (php artisan db:seed of php artisan migrate:fresh --seed)
    }

    public function editScores($matchId){
        // get the match
        $match = Matches::find($matchId);
        // return the view
        return view('teams.editwedstrijden', [
            'match' => $match
        ]);
    }

    public function saveEditedScores(Request $request, $matchId){
        // get the match
        $request->validate([
            'team1_score' => 'required|integer',
            'team2_score' => 'required|integer',
        ]);
        $match = Matches::find($matchId);
        // update the match
        $match->team1_score = $request->team1_score;
        $match->team2_score = $request->team2_score;
        // save the match
        $match->save();

        if($request->team1_score > $request->team2_score){
            $team1 = Team::find($match->team1_id);
            $team1->points += 3;
            $team1->save();
        } else if($request->team2_score > $request->team1_score){
            $team2 = Team::find($match->team2_id);
            $team2->points += 3;
            $team2->save();
        } else{
            $team1 = Team::find($match->team1_id);
            $team1->points += 1;
            $team1->save();
            $team2 = Team::find($match->team2_id);
            $team2->points += 1;
            $team2->save();
        }
        // redirect to the index page
        return redirect()->route('wedstrijd.overzicht')->with('message', 'Wedstrijd is aangepast');
    }
}
