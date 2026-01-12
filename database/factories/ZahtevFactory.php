<?php

namespace Database\Factories;

use App\Models\Klijent;
use App\Models\ProductSpecialist;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZahtevFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->regexify('[A-Za-z0-9]{50}'),
            'sadrzaj' => fake()->text(),
            'status_zahteva' => fake()->randomElement(["novi","otvoren","analiza","razvoj","zatvoren"]),
            'vrsta' => fake()->randomElement(["bug","razvoj","regulativa"]),
            'prioritet' => fake()->randomElement(["nizak","normalan","visok","kritican"]),
            'fajl' => fake()->word(),
            'datum_kreiranja' => fake()->dateTime(),
            'klijent_id' => Klijent::factory(),
            'product_specialist_id' => ProductSpecialist::factory(),
        ];
    }
}
