<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ObradaZahteva;

class ObradaZahtevaSeeder extends Seeder
{
    public function run()
    {
        ObradaZahteva::create([
            'zahtev_id' => 1,
            'komentar_product_sp' => 'Proveriti login API',
            'komentar_klijenta' => 'Sve u redu, čekamo update',
            'dodatni_fajl' => null,
        ]);

        ObradaZahteva::create([
            'zahtev_id' => 2,
            'komentar_product_sp' => 'Razrada plana razvoja',
            'komentar_klijenta' => 'Potrebna brza implementacija',
            'dodatni_fajl' => null,
        ]);
    }
}
