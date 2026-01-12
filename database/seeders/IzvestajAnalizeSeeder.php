<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IzvestajAnalize;

class IzvestajAnalizeSeeder extends Seeder
{
    public function run()
    {
        IzvestajAnalize::create([
            'zakljucak_id' => 1,
            'izvestaj_analize' => 'Bug je potvrđen i prosleđen timu za ispravku.',
        ]);

        IzvestajAnalize::create([
            'zakljucak_id' => 2,
            'izvestaj_analize' => 'Funkcionalnost ne može biti reprodukovana, razvoj je potreban.',
        ]);
    }
}
