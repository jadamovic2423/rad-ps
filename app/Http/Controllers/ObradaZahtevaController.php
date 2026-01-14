<?php

namespace App\Http\Controllers;

use App\Models\Zahtev;
use App\Models\User;
use App\Models\ProductSpecialist;

class ObradaZahtevaController extends Controller
{
    public function delegate($id)
    {
        $ticket = Zahtev::findOrFail($id);

        // uzmi sve aktivne specijaliste
        $specialists = ProductSpecialist::where('status', 'aktivan')->get();

        return view('tickets.delegate_ticket', compact('ticket', 'specialists'));
    }


    public function delegateStore($id)
    {
        $ticket = Zahtev::findOrFail($id);
        $ticket->product_specialist_id = request('product_specialist_id');
        $ticket->status_zahteva = 'otvoren'; $ticket->save();
        $ticket->save();

        return redirect()->route('tickets.new_tickets')
                         ->with('success', 'Zahtev je uspešno delegiran.');
    }
}

