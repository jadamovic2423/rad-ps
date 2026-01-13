<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Klijent;

class KlijentSeeder extends Seeder
{
    public function run()
    {
        Klijent::create([
            'klijent' => 'Bole',
            'banka' => 'ProCredit banka',
            'status' => 'aktivan',
        ]);

        Klijent::create([
            'klijent' => 'Milica',
            'banka' => 'AIK banka',
            'status' => 'aktivan',
        ]);
    }
}
