<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSpecialist;

class ProductSpecialistSeeder extends Seeder
{
    public function run()
    {
        ProductSpecialist::create([
            'product_specialista' => 'Dule',
            'senioritet' => 'senior',
            'status' => 'aktivan',
        ]);

        ProductSpecialist::create([
            'product_specialista' => 'Misa',
            'senioritet' => 'medior',
            'status' => 'aktivan',
        ]);
        
        ProductSpecialist::create([
            'product_specialista' => 'Pera',
            'senioritet' => 'senior',
            'status' => 'aktivan',
        ]);

        ProductSpecialist::create([
            'product_specialista' => 'Jelena',
            'senioritet' => 'junior',
            'status' => 'neaktivan',
        ]);

        ProductSpecialist::create([
            'product_specialista' => 'Milos',
            'senioritet' => 'junior',
            'status' => 'aktivan',
        ]);
    }
}
