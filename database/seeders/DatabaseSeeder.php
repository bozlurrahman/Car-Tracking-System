<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CarSeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\UserSeeder;

// php artisan migrate:fresh --seed
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarSeeder::class,
            UserSeeder::class,
            CitySeeder::class
        ]);
    }
}
