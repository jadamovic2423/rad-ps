<!DOCTYPE html>
<html>
<head>
    <title>Lista zahteva</title>
    <style>
        body { background:#dceacb; font-family: Arial; }
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

        .id-col {
            text-align: center;   /* centriraj vrednosti u ID koloni */
            width: 10%;           /* opciono: fiksna širina kolone */
        }

        h2.center {
    font-weight: normal;   /* uklanja bold sa naslova */
    font-size: 22px;       /* po želji, možeš povećati ili smanjiti */
    margin-bottom: 20px;
}

.btn {
    background:#8bc34a;
    padding:6px 12px;
    border:2px solid #000; /* jači okvir */
    text-decoration:none;
    color: black;
    font-weight: bold;     /* dugmad boldovana */
    font-size: 18px;
}
th, td {
    border: 1px solid #333;
    padding: 10px;
    background: #eef7c4;
    font-size: 22px;   /* povećan font za nazive kolona i sadržaj */
}


    </style>
</head>
<body>
<h1 style="text-align:center; font-size:28px; margin:20px 0; font-weight:bold;"> Tiketing sistem </h1>
<h2 class="center">Pregled liste zahteva</h2>

<table>
    <tr>
        <th class="id-col">ID</th>
        <th>NAZIV</th>
        <th class="options-col">OPCIJE</th>
    </tr>
    @foreach($tickets as $ticket)
        <tr>
            <td class="id-col">{{ sprintf('%04d', $ticket->id) }}</td>
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
