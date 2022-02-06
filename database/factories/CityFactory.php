<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Fakecar;
use App\Models\User;
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = (new \Faker\Factory())::create();
        $this->faker->addProvider(new Fakecar($faker));

        $users = User::pluck('id')->toArray();
        $cars = Car::pluck('id')->toArray();

        return [
            // 'name' => $this->faker->name(),
            'name' => $this->faker->vehicle(),
            'active' => true,
            // 'title' => ucfirst($this->faker->words($this->faker->numberBetween(1, 5), true)),
            'description' => [
                'en' => $this->faker->paragraph(50),
                'fr' => $this->faker->paragraph(50),
            ],
            // 'user_id' => User::inRandomOrder()->first()->id,
            'user_id' => $this->faker->randomElement($users),
            'car_id' => $this->faker->randomElement($cars),
            // 'tags' => $this->faker->randomElement(["Maruti Suzuki Alto", "Renault"]),
            'tags' => [$this->faker->vehicleBrand()],
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}
