<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReprodukovanjeZahtevaController extends Controller
{
    public function index() {
        return ReprodukovanjeZahteva::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'zahtev_id' => 'required|exists:zahtevs,zahtev_id',
            'reprodukovanje_pokusaj' => 'required|integer',
            'reprodukovan' => 'required|boolean',
            'komentar' => 'required|string',
        ]);
        return ReprodukovanjeZahteva::create($data);
    }

    public function show(ReprodukovanjeZahteva $reprodukovanjeZahteva) {
        return $reprodukovanjeZahteva;
    }

    public function update(Request $request, ReprodukovanjeZahteva $reprodukovanjeZahteva) {
        $data = $request->validate([
            'reprodukovanje_pokusaj' => 'sometimes|integer',
            'reprodukovan' => 'sometimes|boolean',
            'komentar' => 'sometimes|string',
        ]);
        $reprodukovanjeZahteva->update($data);
        return $reprodukovanjeZahteva;
    }

    public function destroy(ReprodukovanjeZahteva $reprodukovanjeZahteva) {
        $reprodukovanjeZahteva->delete();
        return response()->json(['message' => 'Reprodukovanje zahteva obrisano']);
    }

    // Use case
    public function dodajPokusaj(Request $request, $id) {
        $data = $request->validate([
            'reprodukovanje_pokusaj' => 'required|integer',
            'reprodukovan' => 'required|boolean',
            'komentar' => 'required|string',
        ]);

        $data['zahtev_id'] = $id;
        return ReprodukovanjeZahteva::create($data);
    }
}
