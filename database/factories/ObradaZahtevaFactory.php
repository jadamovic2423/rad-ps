<?php

namespace Database\Factories;

use App\Models\Zahtev;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObradaZahtevaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'komentar_product_sp' => fake()->text(),
            'komentar_klijenta' => fake()->text(),
            'dodatni_fajl' => fake()->word(),
            'zahtev_id' => Zahtev::factory(),
        ];
    }
}
