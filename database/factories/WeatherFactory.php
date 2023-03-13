<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

class WeatherFactory extends Factory
{
    use WithFaker;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city' => $this->faker->randomElement(['Limassol', 'Barcelona', 'Amsterdam']),
            'temperature' => $this->faker->randomElement([20, 19, 18, 17, 15, 14]),
        ];
    }
}
