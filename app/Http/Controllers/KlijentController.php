<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klijent;
use App\Models\Zahtev;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;  



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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv'     => 'required|string|max:255',
            'vrsta'     => 'required|string',
            'prioritet' => 'required|string',
            'sadrzaj'   => 'required|string',
            'fajl'      => 'nullable|file|max:2048',
        ]);

        $ticket = new Zahtev();
        $ticket->naziv           = $validated['naziv'];
        $ticket->vrsta           = $validated['vrsta'];
        $ticket->prioritet       = $validated['prioritet'];
        $ticket->sadrzaj         = $validated['sadrzaj'];
        $ticket->status_zahteva  = 'novi'; // koristi vrednosti iz enum-a
        $ticket->datum_kreiranja = Carbon::now();

        // 🔑 obavezne kolone iz migracije
        // trenutno zakucane vrednosti da constrainti ne pucaju
        $ticket->klijent_id = 1; 
        $ticket->product_specialist_id = 1; 

        if ($request->hasFile('fajl')) {
            $file = $request->file('fajl');
            $originalName = $file->getClientOriginalName(); // ovo je originalni naziv

            // snimi fajl sa originalnim imenom
            $path = $file->storeAs('tickets', $originalName, 'public');

            $ticket->fajl = $originalName; // ili $path ako želiš putanju
        }


        $ticket->save();

        // nakon kreiranja prikazuje success.blade.php
        return view('tickets.success', ['ticketId' => $ticket->id]);

    }

    public function uploadFile(Request $request, $id)
    {
        $ticket = Zahtev::findOrFail($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('tickets', $originalName, 'public');

            // snimi podatke u bazu
            $ticket->fajl = $originalName;
            $ticket->save();
        }

        return redirect()->route('client.ticket.show', $ticket->id);
    }



}
