<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZakljucivanjeAnalizeController extends Controller
{
    public function index() {
        return ZakljucivanjeAnalize::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'reprodukovan_id' => 'required|exists:reprodukovanje_zahtevas,id',
        ]);
        return ZakljucivanjeAnalize::create($data);
    }

    public function show(ZakljucivanjeAnalize $zakljucivanjeAnalize) {
        return $zakljucivanjeAnalize;
    }

    public function update(Request $request, ZakljucivanjeAnalize $zakljucivanjeAnalize) {
        $data = $request->validate([
            'reprodukovan_id' => 'sometimes|exists:reprodukovanje_zahtevas,id',
        ]);
        $zakljucivanjeAnalize->update($data);
        return $zakljucivanjeAnalize;
    }

    public function destroy(ZakljucivanjeAnalize $zakljucivanjeAnalize) {
        $zakljucivanjeAnalize->delete();
        return response()->json(['message' => 'Zakljucivanje analize obrisano']);
    }

    // Use case
    public function kreirajZakljucak(Request $request) {
        $data = $request->validate([
            'reprodukovan_id' => 'required|exists:reprodukovanje_zahtevas,id',
        ]);
        return ZakljucivanjeAnalize::create($data);
    }
}
