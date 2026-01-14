<!DOCTYPE html>
<html>
<head>
    <title>Zahtev {{ $ticket->id }}</title>
    <style>
        body {
            background: #dfe9c7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 0;
            width: 60%;       /* ista širina kao tabela */
            margin: 0 auto;   /* centriraj */
        }


        .column {
            width: 32%;
            background: #eef7c4;
            border: 1px solid #333;
            padding: 15px;
            box-sizing: border-box;
        }

        .column h3 {
            margin-top: 0;
            text-align: center;
            padding: 8px;
            border-bottom: 1px solid #333;
        }

.field {
    display: flex;     
    gap: 8px;          
    margin-bottom: 10px;
    align-items: center; /* vertikalno poravnanje */
}

.field strong {
    margin: 0;
    font-weight: bold;
    white-space: nowrap; /* da labela ne prelazi u novi red */
}


        .actions {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            padding: 20px 40px;
            background: #dfe9c7;
            border-top: 1px solid #333;
        }

        .actions .left,
        .actions .right {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .actions .left {
            align-items: flex-start;
        }

        .actions .right {
            align-items: flex-end;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            background: #8bc34a;
            border: 1px solid #333;
            text-decoration: none;
            color: #000;
            font-size: 22px;
            font-weight: bold;
            white-space: nowrap;
            border-radius: 4px;
        }

        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.2);
        }

        .modal {
            width: 320px;
            margin: 120px auto;
            background: #cfd8c3;
            border: 1px solid #333;
            padding: 15px;
            text-align: center;
        }

.textarea-sveska {
    width: 280px;              /* fiksna širina unutar modala */
    height: 90px;              /* za 3 linije */
    line-height: 30px;
    font-size: 16px;
    padding: 4px 12px;
    resize: none;
    background-color: transparent;

    border: none; /* uklanja okvir oko polja */

    background-image: repeating-linear-gradient(
        to bottom,
        transparent 0px,
        transparent 29px,
        #000 30px
    );
    background-size: calc(100% - 24px) 30px;
    background-position: left 12px top 0px;
    color: #000;
}

    </style>
</head>
<body>
<h1 style="text-align:center; font-size:28px; margin:20px 0; font-weight:bold;"> Tiketing sistem </h1>
<div class="container">
    <!-- Komentari -->
    <div class="column">
        <h3>Komentari</h3>
        <p>Nema komentara.</p>
    </div>

    <!-- Zahtev -->
    <div class="column">
        <h3>Zahtev {{ $ticket->id }}</h3>

        <div class="field"><strong>Naziv:</strong> <span>{{ $ticket->naziv }}</span></div>
        <div class="field"><strong>Opis:</strong> <span>{{ $ticket->sadrzaj }}</span></div>
        <div class="field"><strong>Vrsta:</strong> <span>{{ $ticket->vrsta }}</span></div>
        <div class="field"><strong>Prioritet:</strong> <span>{{ $ticket->prioritet }}</span></div>
        <div class="field"><strong>Status:</strong> <span>{{ $ticket->status_zahteva }}</span></div>
        <div class="field">
            <strong>Fajlovi:</strong>
            <span>{{ $ticket->fajl ?? '/' }}</span>
        </div>

    </div>

    <!-- Komunikacija -->
    <div class="column">
        <h3>Komunikacija</h3>
        @php $broj = 1; @endphp
        @foreach($ticket->obradaZahteva as $obrada)
            @if($obrada->komentar_product_sp)
                <p>{{ $broj++ }}. PS: {{ $obrada->komentar_product_sp }}</p>
            @endif
            @if($obrada->komentar_klijenta)
                <p>{{ $broj++ }}. K: {{ $obrada->komentar_klijenta }}</p>
            @endif
        @endforeach
        @if($broj === 1)
            <p>Nema poruka.</p>
        @endif
    </div>
</div>

<div class="actions">
    <div class="left">
        <a class="btn" href="{{ route('tickets.new_tickets') }}">Nazad na listu zahteva</a>

        @if($ticket->reprodukovanja->isNotEmpty())
            <a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=conclusion">
                Zaključak
            </a>
        @else
            <button class="btn" disabled>Zaključak (nije dostupno)</button>
        @endif

    </div>
    <div class="right">
        <a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=message">Pošalji poruku</a>
        <a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=comment">Unesi komentar</a>
        <a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=status">Promeni status</a>
        <a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=type">Promeni vrstu</a>
        <a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=reproduced">Reprodukovano</a>
    </div>
</div>


{{-- MODALI --}}
@if(request('modal'))
<div class="overlay">
    <div class="modal">
        @if(request('modal') === 'message')
            <h3>Poruka</h3>
            <form method="POST" action="{{ route('tickets.message.ps', $ticket->id) }}">
                @csrf
                <textarea name="poruka" class="textarea-sveska" placeholder=""></textarea>
                <button type="submit" class="btn">Pošalji</button>
            </form>

        @elseif(request('modal') === 'comment')
            @include('tickets.modals.comment', ['ticket' => $ticket])

        @elseif(request('modal') === 'status')
            @include('tickets.modals.status', ['ticket' => $ticket])

        @elseif(request('modal') === 'type')
            @include('tickets.modals.type', ['ticket' => $ticket])

        @elseif(request('modal') === 'reproduced')
            @include('tickets.modals.reproduced', ['ticket' => $ticket])

        @elseif(request('modal') === 'conclusion')
            @include('tickets.modals.conclusion', ['ticket' => $ticket])
        @endif

        <br>
    </div>
</div>
@endif


</body>
</html>
