<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            ParametrageSeeder::class,
            ListWithCategorySeeder::class,
            SubscriptionPermissionsSeeder::class,
            SubscriptionSeeder::class,
        ]);
    }
}
