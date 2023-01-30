<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    *
    * @return void
    */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // user seeder
        \App\Models\User::factory()->create([
            'name' => 'user_test',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user2_test',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('123')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user3_test',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('123')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user4_test',
            'email' => 'user4@gmail.com',
            'password' => bcrypt('123')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user5_test',
            'email' => 'user5@gmail.com',
            'password' => bcrypt('123')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user6_test',
            'email' => 'user6@gmail.com',
            'password' => bcrypt('123')
        ]);
        // admin seeder
        \App\Models\User::factory()->create([
            'name' => 'admin_test',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("123"),
            'is_admin' => 1
        ]);
        // roep de seeders aan
        $this->call(TeamsSeeder::class);
        $this->call(MatchSeeder::class);

    }
}
