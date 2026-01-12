<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObradaZahtevaController extends Controller
{
    public function index() {
        return ObradaZahteva::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'zahtev_id' => 'required|exists:zahtevs,zahtev_id',
            'komentar_product_sp' => 'nullable|string',
            'komentar_klijenta' => 'nullable|string',
            'dodatni_fajl' => 'nullable|string',
        ]);
        return ObradaZahteva::create($data);
    }

    public function show(ObradaZahteva $obradaZahteva) {
        return $obradaZahteva;
    }

    public function update(Request $request, ObradaZahteva $obradaZahteva) {
        $data = $request->validate([
            'komentar_product_sp' => 'nullable|string',
            'komentar_klijenta' => 'nullable|string',
            'dodatni_fajl' => 'nullable|string',
        ]);
        $obradaZahteva->update($data);
        return $obradaZahteva;
    }

    public function destroy(ObradaZahteva $obradaZahteva) {
        $obradaZahteva->delete();
        return response()->json(['message' => 'Obrada zahteva obrisana']);
    }
}
