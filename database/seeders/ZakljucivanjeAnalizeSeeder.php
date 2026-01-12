<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ZakljucivanjeAnalize;

class ZakljucivanjeAnalizeSeeder extends Seeder
{
    public function run()
    {
        ZakljucivanjeAnalize::create([
            'reprodukovan_id' => 1,
        ]);

        ZakljucivanjeAnalize::create([
            'reprodukovan_id' => 2,
        ]);
    }
}
