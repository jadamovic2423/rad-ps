<!DOCTYPE html>
<html>
<head>
    <title>Lista zahteva</title>
    <style>
        body { background:#dfe9c7; font-family: Arial; }
        table { border-collapse: collapse; margin:30px auto; width:60%; }
        th, td { border:1px solid #333; padding:10px; background:#eef7c4; }
        .btn { background:#8bc34a; padding:6px 12px; border:1px solid #333; text-decoration:none; }
        .center { text-align:center; }
    </style>
</head>
<body>

<h2 class="center">Pregled liste zahteva</h2>

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
        </td>
    </tr>
    @endforeach
</table>

<div class="center">
    <a class="btn" href="{{ route('home') }}">Nazad na početni ekran</a>
</div>

</body>
</html>
