<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

// /** @var \Illuminate\Database\Eloquent\Factory $factory */

// use Carbon\Carbon;
// use Illuminate\Support\Facades\Hash;
// use Faker\Generator as Faker;
// use App\Models\Admin\Admin;

// $factory->define(Admin::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => Hash::make('password'),
//         'active' => 1,
//         'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//         'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//     ];
// });

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'title' => $this->faker->name(),
            'title' => ucfirst($this->faker->words($this->faker->numberBetween(1, 5), true)),
            'category' => $this->faker->randomElement(["Maruti Suzuki Alto", "Renault Kwid", "Hyundai i10", "Volkswagen Polo", "Maruti Suzuki Baleno", "Hyundai i20", "Tata Tiago", "Maruti Suzuki Swift", "Hyundai Grand i10", "Maruti Suzuki WagonR"]),
            'description' => [
                'en' => $this->faker->paragraph(50),
                'fr' => $this->faker->paragraph(50),
            ],
            'summary' => [
                'en' => $this->faker->paragraph(10),
                'fr' => $this->faker->paragraph(10),
            ],
            'author' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 10, 900000),
            'commentable' => $this->faker->boolean(80),
            'publication_date' => $this->faker->dateTime,
        ];
    }
}
