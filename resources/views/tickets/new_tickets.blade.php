<!DOCTYPE html>
<html>
<head>
    <title>Pregled zahteva - Novi</title>
    <style>
        body { background:#dfe9c7; font-family: Arial; }
        table { border-collapse: collapse; margin: 30px auto; width: 70%; }
        th, td { border:1px solid #333; padding:10px; background:#eef7c4; }
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
            white-space: nowrap;
            width: 1%;
        }
        td.options .btn {
            display: inline-block;
            margin: 0 2px;
        }
        table {
    border-collapse: collapse;
    margin: 30px auto;
    width: 60%;              /* smanjena širina tabele */
}

th, td {
    border: 1px solid #333;
    padding: 10px;
    background: #eef7c4;
    font-size: 18px;
}

td.id-col {
    text-align: center;      /* centriraj vrednosti u ID koloni */
}

.btn {
    padding: 6px 12px;
    background: #8bc34a;
    border: 2px solid #000; 
    text-decoration: none;
    color: #000;
    font-weight: bold;       
}

h3.top {
    font-weight: normal;     
    font-size: 22px;
    margin-top: 10px;
}
#nazad {
    font-size: 18px;
}
.btn.active {
    background: #4a7c2a;  
    border: 2px solid #000;
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
            <td class="id-col">{{ sprintf('%04d', $ticket->id) }}</td>
            <td>{{ $ticket->naziv }}</td>
            <td class="options">
                <a class="btn" href="{{ route('tickets.show', $ticket->id) }}">Opširnije</a>
                <a class="btn {{ (request('modal') === 'delegate' && request('id') == $ticket->id) ? 'active' : '' }}"
                href="{{ route('tickets.new_tickets', ['modal' => 'delegate', 'id' => $ticket->id]) }}">
                    Delegiraj
                </a>

            </td>
        </tr>
    @endforeach

</table>

<div class="top" id="nazad">
    <a class="btn" href="{{ route('product.dashboard') }}">Nazad na početni ekran</a>
</div>

{{-- MODAL ZA DELEGIRANJE – prikazuje se samo ako su parametri prosleđeni --}}
@if(request('modal') === 'delegate' && request('id'))
    @php
        $ticket = $tickets->firstWhere('id', request('id'));
        $specialists = \App\Models\ProductSpecialist::all();
    @endphp
    <div class="overlay">
        <div class="modal">
            <h3>Delegiranje</h3>
            <form method="POST" action="{{ route('tickets.delegate.store', $ticket->id) }}">
                @csrf
                <label>Product specijalista:</label>
                <select name="product_specialist_id">
                    @foreach($specialists as $ps)
                        <option value="{{ $ps->id }}">{{ $ps->product_specialista }}</option>
                    @endforeach
                </select>
                <p>Sa ovom izmenom novi status zahteva je <strong>"Otvoren".</strong></p>
                <button type="submit">Delegiraj</button>
            </form>
            <br>
            <a class="btn" href="{{ route('tickets.new_tickets') }}">Zatvori</a>
        </div>
    </div>
@endif

</body>
</html>
