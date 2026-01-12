<?php

namespace Database\Factories;

use App\Models\ZakljucivanjeAnalize;
use Illuminate\Database\Eloquent\Factories\Factory;

class IzvestajAnalizeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'izvestaj_analize' => fake()->text(),
            'zakljucivanje_analize_id' => ZakljucivanjeAnalize::factory(),
        ];
    }
}
