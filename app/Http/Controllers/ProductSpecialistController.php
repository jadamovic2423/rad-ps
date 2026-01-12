<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductSpecialistController extends Controller
{
    public function index() {
        return ProductSpecialist::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'product_specialista' => 'required|string|max:30',
            'senioritet' => 'required|in:junior,medior,senior',
            'status' => 'required|in:aktivan,neaktivan',
        ]);
        return ProductSpecialist::create($data);
    }

    public function show(ProductSpecialist $productSpecialist) {
        return $productSpecialist;
    }

    public function update(Request $request, ProductSpecialist $productSpecialist) {
        $data = $request->validate([
            'product_specialista' => 'sometimes|string|max:30',
            'senioritet' => 'sometimes|in:junior,medior,senior',
            'status' => 'sometimes|in:aktivan,neaktivan',
        ]);
        $productSpecialist->update($data);
        return $productSpecialist;
    }

    public function destroy(ProductSpecialist $productSpecialist) {
        $productSpecialist->delete();
        return response()->json(['message' => 'Product specialist obrisan']);
    }
}

