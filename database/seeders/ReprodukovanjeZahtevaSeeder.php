<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReprodukovanjeZahteva;

class ReprodukovanjeZahtevaSeeder extends Seeder
{
    public function run()
    {
        ReprodukovanjeZahteva::create([
            'zahtev_id' => 1,
            'reprodukovanje_pokusaj' => 1,
            'reprodukovan' => true,
            'komentar' => 'Bug uspešno reprodukovan',
        ]);

        ReprodukovanjeZahteva::create([
            'zahtev_id' => 2,
            'reprodukovanje_pokusaj' => 1,
            'reprodukovan' => false,
            'komentar' => 'Nije moguće reprodukovati, razvojna funkcionalnost',
        ]);
    }
}
