<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klijent;
use App\Models\Zahtev;

class KlijentController extends Controller
{
    public function index(Request $request)
    {
        // Uzmi sve aktivne klijente iz baze
        $klijenti = Klijent::where('status', 'aktivan')->get();

        // Prosledi podatke u Blade view
        return view('tickets.client_home', compact('klijenti'));
    }

    public function create()
    {
        return view('tickets.create_ticket');
    }

    public function list()
    {
        // Uzmi sve zahteve za klijenta (po potrebi filtriraj po user_id iz sessiona)
        $tickets = Zahtev::all();

        return view('tickets.ticket_list', compact('tickets'));

    }
}
