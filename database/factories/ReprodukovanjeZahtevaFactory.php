<?php

namespace Database\Factories;

use App\Models\Zahtev;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReprodukovanjeZahtevaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'reprodukovanje_pokusaj' => fake()->numberBetween(-10000, 10000),
            'reprodukovan' => fake()->boolean(),
            'komentar' => fake()->text(),
            'zahtev_id' => Zahtev::factory(),
        ];
    }
}
