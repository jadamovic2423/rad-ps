<!DOCTYPE html>
<html>
<head>
    <title>Pregled zahteva - Novi</title>
    <style>
        body { background:#dfe9c7; font-family: Arial; }
        table { border-collapse: collapse; margin: 30px auto; width: 70%; }
        th, td { border:1px solid #333; padding:10px; background:#eef7c4; }
        th { background:#e3f0a6; }
        .btn { padding:6px 12px; background:#8bc34a; border:1px solid #333; text-decoration:none; color:#000; }
        .top { text-align:center; margin-top:20px; }

        .overlay {
            position: fixed; top:0; left:0;
            width:100%; height:100%;
            background: rgba(0,0,0,0.3);
        }
        .modal {
            width:320px; margin:120px auto;
            background:#cfd8c3; border:1px solid #333;
            padding:20px; text-align:center;
        }
        select, button { margin-top:10px; padding:6px; width:100%; }
        button { background:#8bc34a; border:1px solid #333; }

        td.options {
    white-space: nowrap;       /* sprečava prelamanje dugmadi */
    width: 1%;                 /* kolona zauzima minimalnu širinu */
}

td.options .btn {
    display: inline-block;     /* dugmad stoje jedno pored drugog */
    margin: 0 2px;             /* mali razmak između dugmadi */
}

    </style>
</head>
<body>

<h2 class="top">Tiketing sistem</h2>
<h3 class="top">Pregled zahteva "Novi"</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Opcije</th>
    </tr>
    @foreach($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td>{{ $ticket->naziv }}</td>
            <td class="options">
                <a class="btn" href="{{ route('tickets.show', $ticket->id) }}">Opširnije</a>
                <a class="btn" href="{{ route('tickets.delegate_ticket', $ticket->id) }}">Delegiraj</a>
            </td>

        </tr>
    @endforeach
</table>

<div class="top">
    <a class="btn" href="{{ route('product.dashboard') }}">Nazad na početni ekran</a>
</div>

{{-- MODAL ZA DELEGIRANJE --}}
@if(request('modal') === 'delegate' && request('id'))
    @php
        $ticket = $tickets->firstWhere('id', request('id'));
        $specialists = \App\Models\ProductSpecialist::all();
    @endphp
    <div class="overlay">
        <div class="modal">
            <h3>Delegiranje zahteva</h3>
            <p><strong>ID:</strong> {{ $ticket->id }}</p>
            <p><strong>Naziv:</strong> {{ $ticket->naziv }}</p>

            <form method="POST" action="{{ route('tickets.delegate.store', $ticket->id) }}">
                @csrf
                <label>Product specijalista:</label>
                <select name="product_specialist_id">
                    @foreach($specialists as $ps)
                        <option value="{{ $ps->id }}">{{ $ps->product_specialista }}</option>
                    @endforeach
                </select>
                <p>Status zahteva biće: <strong>Otvoren</strong></p>
                <button type="submit">Delegiraj</button>
            </form>
            <br>
        </div>
    </div>
@endif

</body>
</html>
