<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KlijentController extends Controller
{
    public function index() {
        return Klijent::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'klijent' => 'required|string|max:30',
            'banka' => 'required|string|max:25',
            'status' => 'required|in:aktivan,neaktivan',
        ]);
        return Klijent::create($data);
    }

    public function show(Klijent $klijent) {
        return $klijent;
    }

    public function update(Request $request, Klijent $klijent) {
        $data = $request->validate([
            'klijent' => 'sometimes|string|max:30',
            'banka' => 'sometimes|string|max:25',
            'status' => 'sometimes|in:aktivan,neaktivan',
        ]);
        $klijent->update($data);
        return $klijent;
    }

    public function destroy(Klijent $klijent) {
        $klijent->delete();
        return response()->json(['message' => 'Klijent obrisan']);
    }
}
