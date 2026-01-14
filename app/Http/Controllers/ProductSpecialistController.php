<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zahtev;   // <- dodaj import modela Zahtev
use App\Models\ProductSpecialist;
use App\Models\ObradaZahteva;

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
        $tickets = Zahtev::where('status_zahteva', 'novi')->get();

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
            // Paginacija za komunikaciju
            $obrada = ObradaZahteva::where('zahtev_id', $ticket->id)
                ->orderBy('created_at', 'desc')
                ->paginate(5, ['*'], 'komunikacija_page');

            // Paginacija za komentare (bez no_activity i development)
            $komentari = $ticket->reprodukovanja()
                ->whereNotNull('komentar')
                ->whereNotIn('komentar', ['no_activity', 'development'])
                ->orderBy('created_at', 'desc')
                ->paginate(5, ['*'], 'komentari_page');

            return view('tickets.ticket_detail_ps', compact('ticket', 'obrada', 'komentari'));
        }

        return view('tickets.ticket_detail_client', compact('ticket'));
    }

    public function delegate($id)
    {
        $ticket = Zahtev::findOrFail($id);
        $specialists = ProductSpecialist::all();

        return view('tickets.delegate_ticket', compact('ticket', 'specialists'));
    }

    public function delegateList()
    {
        // uzmi sve zahteve u statusu "Novi"
        $tickets = Zahtev::where('status', 'Novi')->get();
        $specialists = ProductSpecialist::all();

        return view('tickets.delegate_ticket', compact('tickets', 'specialists'));
    }


    public function updateStatus(Request $request, $id)
    {
        $ticket = Zahtev::findOrFail($id);
        $ticket->status_zahteva = $request->input('status');
        $ticket->save();

        return redirect()->route('tickets.show', $ticket->id);
    }

    public function updateType(Request $request, $id)
    {
        $ticket = Zahtev::findOrFail($id);
        $ticket->vrsta = $request->input('type');
        $ticket->save();

        return redirect()->route('tickets.show', $ticket->id);
    }



}


