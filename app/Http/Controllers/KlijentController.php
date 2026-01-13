<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klijent;

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
}
