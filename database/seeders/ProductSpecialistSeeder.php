<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSpecialist;

class ProductSpecialistSeeder extends Seeder
{
    public function run()
    {
        ProductSpecialist::create([
            'product_specialista' => 'Dule Markovic',
            'senioritet' => 'senior',
            'status' => 'aktivan',
        ]);

        ProductSpecialist::create([
            'product_specialista' => 'Misa Jovanovic',
            'senioritet' => 'medior',
            'status' => 'aktivan',
        ]);
        
        ProductSpecialist::create([
            'product_specialista' => 'Pera Blagojevic',
            'senioritet' => 'senior',
            'status' => 'aktivan',
        ]);

        ProductSpecialist::create([
            'product_specialista' => 'Jelena Radin',
            'senioritet' => 'junior',
            'status' => 'neaktivan',
        ]);

        ProductSpecialist::create([
            'product_specialista' => 'Milos Stojanovic',
            'senioritet' => 'junior',
            'status' => 'aktivan',
        ]);
    }
}
