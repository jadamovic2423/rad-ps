<!DOCTYPE html>
<html>
<head>
    <title>Lista zahteva</title>
    <style>
        body { background:#dfe9c7; font-family: Arial; }
        table { border-collapse: collapse; margin:30px auto; width:60%; }
        th, td { border:1px solid #333; padding:10px; background:#eef7c4; }
        .btn { 
    background:#8bc34a; 
    padding:6px 12px; 
    border:1px solid #333; 
    text-decoration:none; 
    color: black; /* tekst crn */
}

        .center { text-align:center; }
table { 
    border-collapse: collapse; 
    margin:30px auto; 
    width:45%; /* smanjena širina tabele */
}

.options-col {
    width: 1%;            /* kolona se prilagođava sadržaju */
    white-space: nowrap;  /* sprečava širenje */
    text-align: center;   /* centriraj dugme */
}


    </style>
</head>
<body>

<h2 class="center">Pregled liste zahteva</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th class="options-col">Opcije</th>
    </tr>
    @foreach($tickets as $ticket)
        <tr>
            <td>{{ sprintf('%04d', $ticket->id) }}</td>
            <td>{{ $ticket->naziv }}</td>
            <td class="options-col">
                <a class="btn" 
                   href="{{ session('role') === 'ps' 
                                ? route('tickets.show', $ticket->id) 
                                : route('client.ticket.show', $ticket->id) }}">
                    Opširnije
                </a>
            </td>
        </tr>
    @endforeach
</table>


<div class="center">
    <a class="btn" href="{{ session('role') === 'ps' ? route('product.dashboard') : route('client.dashboard') }}">
        Nazad na početni ekran
    </a>
</div>

</body>
</html>
