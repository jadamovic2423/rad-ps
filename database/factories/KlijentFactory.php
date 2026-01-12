<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KlijentFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'klijent' => fake()->regexify('[A-Za-z0-9]{30}'),
            'banka' => fake()->regexify('[A-Za-z0-9]{25}'),
            'status' => fake()->randomElement(["aktivan","neaktivan"]),
        ];
    }
}
