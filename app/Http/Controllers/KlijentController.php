<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klijent;
use App\Models\Zahtev;

class KlijentController extends Controller
{
    public function index(Request $request)
    {
        $klijenti = Klijent::where('status', 'aktivan')->get();
        return view('tickets.client_home', compact('klijenti'));
    }

    public function create()
    {
        return view('tickets.create_ticket');
    }

    public function list()
    {
        // lista svih zahteva za klijenta
        $tickets = Zahtev::all();

        return view('tickets.ticket_list', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Zahtev::with('obradaZahteva')->findOrFail($id);
        return view('tickets.ticket_detail_client', compact('ticket'));
    }
}
