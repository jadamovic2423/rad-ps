<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zahtev;
use App\Models\ObradaZahteva;
use App\Models\ReprodukovanjeZahteva;
use App\Models\ZakljucivanjeAnalize;

class ZahtevController extends Controller
{
    // -------------------
    // CRUD
    // -------------------

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
            'product_specialist_id' => 'required|exists:product_specialists,id',
        ]);
        return Zahtev::create($data);
    }

    public function show($id) {
        $ticket = Zahtev::with('obradaZahteva')->findOrFail($id);
        return view('tickets.ticket_detail_ps', compact('ticket'));
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
        $zahtev->status_zahteva = 'novi';
        $zahtev->save();
        return response()->json(['message' => 'Zahtev kreiran kao novi']);
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

    // -------------------
    // Komentari i komunikacija
    // -------------------

    public function storeComment(Request $request, $id) {
        ObradaZahteva::create([
            'zahtev_id' => $id,
            'komentar_product_sp' => $request->input('komentar'),
        ]);
        return back()->with('success', 'Komentar dodat.');
    }

    public function storeMessageKlijent(Request $request, $id)
    {
        $poruka = $request->input('poruka');

        ObradaZahteva::create([
            'zahtev_id' => $id,
            'komentar_klijenta' => $poruka,
        ]);

        return redirect()->route('tickets.show', $id)->with('success', 'Poruka poslata kao K.');
    }

    public function storeMessagePS(Request $request, $id)
    {
        $poruka = $request->input('poruka');

        ObradaZahteva::create([
            'zahtev_id' => $id,
            'komentar_product_sp' => $poruka,
        ]);

        return redirect()->route('tickets.show', $id)->with('success', 'Poruka poslata kao PS.');
    }



    // -------------------
    // Promena statusa i vrste
    // -------------------

    public function updateStatus(Request $request, $id) {
        $ticket = Zahtev::findOrFail($id);
        $ticket->status_zahteva = $request->input('status');
        $ticket->save();
        return back()->with('success', 'Status ažuriran.');
    }

    public function updateType(Request $request, $id) {
        $ticket = Zahtev::findOrFail($id);
        $ticket->vrsta = $request->input('vrsta');
        $ticket->save();
        return back()->with('success', 'Vrsta ažurirana.');
    }

    // -------------------
    // Reprodukovanje i zaključak
    // -------------------

    public function storeReproduced(Request $request, $id) {
        ReprodukovanjeZahteva::create([
            'zahtev_id' => $id,
            'reprodukovanje_pokusaj' => $request->input('pokusaj'),
            'reprodukovan' => $request->input('reprodukovan'),
            'komentar' => $request->input('komentar'),
        ]);
        return back()->with('success', 'Reprodukovanje sačuvano.');
    }

    public function storeConclusion(Request $request, $id) {
        $reprodukcija = ReprodukovanjeZahteva::where('zahtev_id', $id)->latest()->first();

        $zakljucak = new ZakljucivanjeAnalize();
        $zakljucak->reprodukovan_id = $reprodukcija->id ?? null;
        $zakljucak->save();

        return redirect()->route('tickets.show', $id)->with('success', 'Zaključak sačuvan.');
    }
}
