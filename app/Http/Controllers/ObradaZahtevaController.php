<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zahtev;
use App\Models\User;
use App\Models\ProductSpecialist;
use App\Models\ObradaZahteva;

class ObradaZahtevaController extends Controller
{
    public function delegate($id)
    {
        $ticket = Zahtev::findOrFail($id);

        // uzmi sve aktivne specijaliste
        $specialists = ProductSpecialist::where('status', 'aktivan')->get();

        return view('tickets.delegate_ticket', compact('ticket', 'specialists'));
    }


    public function storeDelegation(Request $request, $id)
    {
        $ticket = Zahtev::findOrFail($id);

        $ticket->update([
            'status_zahteva' => 'otvoren',
            'product_specialist_id' => $request->input('product_specialist_id')
        ]);

        ObradaZahteva::create([
            'zahtev_id' => $ticket->id,
            'komentar_product_sp' => 'Zahtev je uzet u dalju obradu.',
        ]);

        return redirect()->route('tickets.new_tickets')
                        ->with('success', 'Zahtev je delegiran i obaveštenje je poslato klijentu.');
    }



}

