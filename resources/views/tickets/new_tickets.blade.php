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
        <td>{{ $ticket->title }}</td>
        <td>
            <a class="btn" href="{{ route('tickets.show', $ticket->id) }}">Opširnije</a>
            <a class="btn" href="{{ route('tickets.delegate', $ticket->id) }}">Delegiraj</a>
        </td>
    </tr>
    @endforeach
</table>

<div class="top">
    <a class="btn" href="{{ route('home') }}">Nazad na početni ekran</a>
</div>

</body>
</html>
