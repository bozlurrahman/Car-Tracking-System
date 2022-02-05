<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'roles' => ['admin'],
        ]);

        for ($i = 1; $i <= 10; $i++) {
            User::factory()->create([
                'name' => "Manager $i",
                'email' => "manager-$i@example.com",
                'roles' => ['manager'],
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            User::factory()->create([
                'name' => "Operator $i",
                'email' => "operator-$i@example.com",
                'roles' => ['operator'],
            ]);
        }
    }
}
