<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSpecialistFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_specialista' => fake()->regexify('[A-Za-z0-9]{30}'),
            'senioritet' => fake()->randomElement(["junior","medior","senior"]),
            'status' => fake()->randomElement(["aktivan","neaktivan"]),
        ];
    }
}
