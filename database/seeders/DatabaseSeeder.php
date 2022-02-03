<?php

namespace Database\Seeders;

use Database\Seeders\CarSeeder;
use Illuminate\Database\Seeder;

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
        
        \App\Models\User::factory(10)->create();
        $this->call([
            CarSeeder::class
        ]);
    }
}
