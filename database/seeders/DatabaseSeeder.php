<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
{
    $this->call([
        KlijentSeeder::class,
        ProductSpecialistSeeder::class,
        ZahtevSeeder::class,
        ObradaZahtevaSeeder::class,
        ReprodukovanjeZahtevaSeeder::class,
        ZakljucivanjeAnalizeSeeder::class,
        IzvestajAnalizeSeeder::class,
    ]);
}

}
