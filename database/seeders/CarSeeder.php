<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->truncate();

        \App\Models\Car::factory(50)->create();

        // factory(\App\Models\Car::class, 500)->create();
    }
}
