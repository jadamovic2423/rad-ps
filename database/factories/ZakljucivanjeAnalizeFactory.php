<?php

namespace Database\Factories;

use App\Models\ReprodukovanjeZahteva;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZakljucivanjeAnalizeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'reprodukovanje_zahteva_id' => ReprodukovanjeZahteva::factory(),
        ];
    }
}
