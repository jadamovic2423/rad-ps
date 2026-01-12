<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zahtev;
use App\Models\Klijent;
use App\Models\ProductSpecialist;

class ZahtevSeeder extends Seeder
{
    public function run()
    {
        Zahtev::create([
            'naziv' => 'Problem sa login-om',
            'sadrzaj' => 'Klijent ne može da se prijavi u aplikaciju',
            'status_zahteva' => 'novi',
            'vrsta' => 'bug',
            'prioritet' => 'kritican',
            'fajl' => null,
            'datum_kreiranja' => now(),
            'klijent_id' => 1,
            'product_specialist_id' => 1,
        ]);

        Zahtev::create([
            'naziv' => 'Dodavanje nove funkcionalnosti',
            'sadrzaj' => 'Potrebno dodati novu funkcionalnost X',
            'status_zahteva' => 'novi',
            'vrsta' => 'razvoj',
            'prioritet' => 'normalan',
            'fajl' => null,
            'datum_kreiranja' => now(),
            'klijent_id' => 2,
            'product_specialist_id' => 2,
        ]);
        
        Zahtev::create([
            'naziv' => 'Ne radi menjačnica',
            'sadrzaj' => 'U mKlik aplikaciji ne radi kupovina deviza-',
            'status_zahteva' => 'novi',
            'vrsta' => 'bug',
            'prioritet' => 'visok',
            'fajl' => null,
            'datum_kreiranja' => now(),
            'klijent_id' => 2,
            'product_specialist_id' => 3,
        ]);
    }
}
