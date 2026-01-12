<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IzvestajAnalizeController extends Controller
{
    public function index() {
        return IzvestajAnalize::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'zakljucak_id' => 'required|exists:zakljucivanje_analizes,id',
            'izvestaj_analize' => 'required|string',
        ]);
        return IzvestajAnalize::create($data);
    }

    public function show(IzvestajAnalize $izvestajAnalize) {
        return $izvestajAnalize;
    }

    public function update(Request $request, IzvestajAnalize $izvestajAnalize) {
        $data = $request->validate([
            'izvestaj_analize' => 'sometimes|string',
        ]);
        $izvestajAnalize->update($data);
        return $izvestajAnalize;
    }

    public function destroy(IzvestajAnalize $izvestajAnalize) {
        $izvestajAnalize->delete();
        return response()->json(['message' => 'Izvestaj analize obrisan']);
    }

    // Use case
    public function dodajIzvestaj(Request $request) {
        $data = $request->validate([
            'zakljucak_id' => 'required|exists:zakljucivanje_analizes,id',
            'izvestaj_analize' => 'required|string',
        ]);
        return IzvestajAnalize::create($data);
    }
}
