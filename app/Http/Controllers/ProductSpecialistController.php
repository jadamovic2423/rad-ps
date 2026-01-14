<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zahtev;   // <- dodaj import modela Zahtev
use App\Models\ProductSpecialist;

class ProductSpecialistController extends Controller
{
    public function index(Request $request)
    {
        $username = $request->session()->get('username', 'Nepoznat');
        return view('tickets.product_specialist_home', compact('username'));
    }

    public function tickets()
    {
        // lista svih zahteva
        $tickets = Zahtev::all();
        return view('tickets.product_specialist_tickets', compact('tickets'));
    }

    public function newTickets()
    {
        // filtriraj samo zahteve u statusu "Novi"
        $tickets = Zahtev::where('status', 'Novi')->get();

        return view('tickets.new_tickets', compact('tickets'));
    }

        public function list()
    {
        // Uzmi sve tikete (po potrebi filtriraj)
        $tickets = Zahtev::all();

        // Vrati blade koji si poslala: resources/views/tickets/ticket_list.blade.php
        return view('tickets.ticket_list', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Zahtev::findOrFail($id);

        if (session('role') === 'ps') {
            return view('tickets.ticket_detail_ps', compact('ticket'));
        }

        return view('tickets.ticket_detail_client', compact('ticket'));
    }

}


