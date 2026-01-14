<!DOCTYPE html>
<html>
<head>
    <title>Delegiranje zahteva</title>
    <style>
        body { background:#dfe9c7; font-family: Arial; }
        .modal {
            width:300px; margin:100px auto; padding:20px;
            border:1px solid #333; background:#cfd8c3;
            text-align:center;
        }
        select, button { margin-top:10px; padding:6px; width:100%; }
        button { background:#8bc34a; border:1px solid #333; }
    </style>
</head>
<body>

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

        <p>Status zahteva biće: <strong>Otvoren</strong></p>

        <button type="submit">Potvrdi</button>
    </form>
</div>

</body>
</html>
