<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\User;

class TeamsController extends Controller
{
    // Pak alle teams op die de gebruiker heeft aangemaakt
    public function index()
    {

        // if user is an admin, show all teams
        if (auth()->user()->is_admin == 1) {
            $team = Team::all();
        }
        else{
            // if user is not an admin, show only the teams he created
            $team = Team::Where('creator_id', auth()->user()->id)->get();
        }
        // return view with the teams
        return view('teams.overzicht', [
            'teams' => $team
        ]);
    }
    public function create()
    {
        // return view to create a team
        return view('teams.create');
    }
    // edit pagina
    public function edit($id){
        // return view with the teams
        $team = Team::findOrFail($id);
        //find users where team is null
        $users = User::where('team_id', null)->get();
        $teammates = User::where('team_id', $id)->get();

        return view('teams.edit', [
            'team' => $team,
            'users' => $users,
            'teammates' => $teammates
        ]);
    }
    // Store the order of the teams
    public function store(Request $request)
    {
        // data validatie
        $request->validate([
            'name' => 'required|min:4|max:16|unique:teams'
        ]);
        // Als het gebruiker een admin is dan kan het ook het punten updaten
        if(auth()->user()->is_admin == 1){
            // update voor admin
            Team::create([
                // auth is niet een error
                'name'       => $request->name,
                'points'     => $request->points,
                'creator_id' => auth()->user()->id
            ]);
        } else{
            // update voor de gebruiker
            Team::create([
                // auth is niet een error
                'name'       => $request->name,
                'creator_id' => auth()->user()->id
            ]);
        }
        return redirect()->route('teams.index')->with('message', 'Team is aangemaakt');
    }

    // Update team
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:16'
        ]);
        // Als het gebruiker een admin is dan kan het ook het punten updaten
        if(auth()->user()->is_admin == 1){
            // update voor admin
            Team::where('id', $id)->update([
                // auth is niet een error
                'name'       => $request->name,
                'points'     => $request->points
            ]);
            if($request->new_teammate != null){
                $update = User::findOrFail($request->new_teammate);
                $update->team_id = $id;
                $update->save();
            }
        } else{
            // update voor de gebruiker
            Team::where('id', $id)->update([
                // auth is niet een error
                'name'       => $request->name
            ]);
            if($request->new_teammate != null){
                $update = User::findOrFail($request->new_teammate);
                $update->team_id = $id;
                $update->save();
            }
        }
        // succes message
        return redirect()->route('teams.index')->with('success', 'Uw team is aangepast');
    }

    // Destroy is een functie die je kan gebruiken om een team te verwijderen
    public function destroy($id)
    {
        User::where('team_id', $id)->update([
            'team_id' => null
        ]);
        Team::Destroy($id);

        return back()->with('message', 'Team is succesvol verwijderd!');
    }

    public function destroyTeammate($teamId, $userId){
        $update = User::findOrFail($userId);
        $update->team_id = null;
        $update->save();

        return back()->with('message', 'Uw teamlid is verwijderd');
    }
}
