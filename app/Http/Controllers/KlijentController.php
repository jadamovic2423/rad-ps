<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klijent;
use App\Models\Zahtev;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Validator;


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
        $ticket = Zahtev::findOrFail($id);

        // Paginacija komunikacije – npr. 5 poruka po strani
        $komunikacija = $ticket->obradaZahteva()
                            ->orderBy('created_at', 'desc')
                            ->paginate(5);

        return view('tickets.ticket_detail_client', compact('ticket', 'komunikacija'));
    }




    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'naziv'     => 'required|string|max:255',
            'vrsta'     => 'required|string',
            'prioritet' => 'required|string',
            'sadrzaj'   => 'required|string',
            'fajl'      => 'nullable|file|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('client.ticket.create')
                ->with('alert', 'Polja naziv, opis, vrsta i/ili prioritet nisu popunjeni.');
        }


        $validated = $validator->validated();

        $ticket = new Zahtev();
        $ticket->naziv           = $validated['naziv'];
        $ticket->vrsta           = $validated['vrsta'];
        $ticket->prioritet       = $validated['prioritet'];
        $ticket->sadrzaj         = $validated['sadrzaj'];
        $ticket->status_zahteva  = 'novi';
        $ticket->datum_kreiranja = Carbon::now();
        $ticket->klijent_id = auth()->id() ?? 1;
        $ticket->product_specialist_id = 1;

        if ($request->hasFile('fajl')) {
            $file = $request->file('fajl');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('tickets', $originalName, 'public');
            $ticket->fajl = $path;
        }

        $ticket->save();

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

    public function showClientTicket($id)
    {
        $ticket = Zahtev::findOrFail($id);

        // Paginacija komunikacije, npr. 5 poruka po strani
        $komunikacija = $ticket->obradaZahteva()
                            ->orderBy('created_at', 'desc')
                            ->paginate(5);

        return view('tickets.ticket_detail_client', compact('ticket', 'komunikacija'));
    }



}
