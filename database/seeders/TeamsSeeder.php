<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'FC Twenten',
            'points' => 0,
            'creator_id' => 1,
        ]);
        Team::create([
            'name' => 'PL Oosterhout',
            'points' => 0,
            'creator_id' => 1,
        ]);
        Team::create([
            'name' => 'NAC',
            'points' => 0,
            'creator_id' => 2,
        ]);
        Team::create([
            'name' => 'Hengelo LP',
            'points' => 0,
            'creator_id' => 2,
        ]);
        Team::create([
            'name' => 'HF Abbello',
            'points' => 0,
            'creator_id' => 2,
        ]);
        Team::create([
            'name' => 'Rotterdam',
            'points' => 0,
            'creator_id' => 1,
        ]);
        Team::create([
            'name' => 'RATATA LP ',
            'points' => 0,
            'creator_id' => 4,
        ]);
    }
}
