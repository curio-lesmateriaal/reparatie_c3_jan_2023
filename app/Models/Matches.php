<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Matches extends Model
{
    use HasFactory;
    protected $table = 'matches';

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }
    // relatie naar van team 1/2
    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
    public function teams(){
        $team = [
            $this->team1,
            $this->team2
        ];
    }
}
