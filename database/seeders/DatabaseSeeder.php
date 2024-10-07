<?php

namespace Database\Seeders;

<<<<<<< HEAD
<<<<<<< HEAD
use App\Models\User;
=======
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'learnnita@gmail.com',
            'mdp' => bcrypt('test'),
        ]);
=======
=======
>>>>>>> 40fc94a (Initial commit)
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
<<<<<<< HEAD
>>>>>>> master
=======
>>>>>>> 40fc94a (Initial commit)
    }
}
