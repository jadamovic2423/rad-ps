<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZahtevController extends Controller
{
    public function index() {
        return Zahtev::all();
    }

    public function store(Request $request) {
        $data = $request->validate([
            'naziv' => 'required|string|max:50',
            'sadrzaj' => 'required|string',
            'status_zahteva' => 'required|in:novi,otvoren,analiza,razvoj,zatvoren',
            'vrsta' => 'required|in:bug,razvoj,regulativa',
            'prioritet' => 'required|in:nizak,normalan,visok,kritican',
            'fajl' => 'nullable|string',
            'datum_kreiranja' => 'required|date',
            'klijent_id' => 'required|exists:klijents,id',
            'product_specialista_id' => 'required|exists:product_specialists,id',
        ]);
        return Zahtev::create($data);
    }

    public function show(Zahtev $zahtev) {
        return $zahtev;
    }

    public function update(Request $request, Zahtev $zahtev) {
        $data = $request->validate([
            'naziv' => 'sometimes|string|max:50',
            'sadrzaj' => 'sometimes|string',
            'status_zahteva' => 'sometimes|in:novi,otvoren,analiza,razvoj,zatvoren',
            'vrsta' => 'sometimes|in:bug,razvoj,regulativa',
            'prioritet' => 'sometimes|in:nizak,normalan,visok,kritican',
            'fajl' => 'nullable|string',
            'datum_kreiranja' => 'sometimes|date',
        ]);
        $zahtev->update($data);
        return $zahtev;
    }

    // -------------------
    // Use case metode
    // -------------------

    public function nov(Zahtev $zahtev) {
        $zahtev->status_zahteva = 'nov';
        $zahtev->save();
        return response()->json(['message' => 'Zahtev delegiran']);
    }
    

    public function delegiraj(Zahtev $zahtev) {
        $zahtev->status_zahteva = 'otvoren';
        $zahtev->save();
        return response()->json(['message' => 'Zahtev delegiran']);
    }

    public function analiza(Zahtev $zahtev) {
        $zahtev->status_zahteva = 'analiza';
        $zahtev->save();
        return response()->json(['message' => 'Zahtev u analizi']);
    }

    public function razvoj(Zahtev $zahtev) {
        $zahtev->status_zahteva = 'razvoj';
        $zahtev->save();
        return response()->json(['message' => 'Zahtev u razvoju']);
    }


    public function zakljuci(Zahtev $zahtev) {
        $zahtev->status_zahteva = 'zatvoren';
        $zahtev->save();
        return response()->json(['message' => 'Zahtev zatvoren']);
    }
}
