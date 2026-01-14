<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zahtev;
use App\Models\ObradaZahteva;
use App\Models\ReprodukovanjeZahteva;
use App\Models\ZakljucivanjeAnalize;
use Illuminate\Support\Facades\DB;


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

     public function storeComment(Request $request, $id)
        {
            $ticket = Zahtev::findOrFail($id);

            // kreiraj novi zapis u reprodukovanje_zahtevas
            $ticket->reprodukovanja()->create([
                'reprodukovanje_pokusaj' => $ticket->reprodukovanja()->count() + 1,
                'reprodukovan' => true, // ili false, zavisi od logike
                'komentar' => $request->input('comment'),
            ]);

            return redirect()->route('tickets.show', $ticket->id);
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
    // Reprodukovanje i zaključak
    // -------------------

    public function storeReproduced(Request $request, $id)
    {
        $ticket = Zahtev::findOrFail($id);

        $ticket->reprodukovanja()->create([
            'reprodukovanje_pokusaj' => 1,
            'reprodukovan' => $request->input('reproduced') === 'uspesno',
            'komentar' => $request->input('komentar', ''),
        ]);

        return redirect()->route('tickets.show', $ticket->id);
    }



    public function storeConclusion(Request $request, $id)
    {
        $ticket = Zahtev::findOrFail($id);
        $lastReproduced = $ticket->reprodukovanja()->latest()->first();

        if (!$lastReproduced) {
            return redirect()->route('tickets.show', $ticket->id)
                ->with('error', 'Zaključak nije moguće uneti dok ne postoji reprodukovanje.');
        }

        // snimi zaključak u komentar reprodukovanja
        $lastReproduced->update([
            'komentar' => $request->input('conclusion')
        ]);

        // obeleži da postoji zaključivanje
        ZakljucivanjeAnalize::updateOrCreate(
            ['reprodukovan_id' => $lastReproduced->id]
        );

        return redirect()->route('tickets.show', $ticket->id);
    }




    
}
