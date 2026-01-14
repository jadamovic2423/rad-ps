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
            gap: 0; /* uklanja razmak između kolona */
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
            background: #cddc39;
            padding: 8px;
            border-bottom: 1px solid #333;
        }

        .field {
            margin-bottom: 10px;
        }

        .field strong {
            display: block;
            margin-bottom: 4px;
        }

            .actions {
                position: absolute;
                bottom: 5vh;               /* 5% visine ekrana od dna */
                left: 50%;
                transform: translateX(-50%);
                width: 40%;
                display: flex;
                justify-content: space-between;
                padding: 20px 40px;
                background: #dfe9c7;
                z-index: 10;
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
    </style>
</head>
<body>
<h1 style="text-align:center; font-size:28px; margin:20px 0; font-weight:bold;"> Tiketing sistem </h1>
<div class="container">
    <!-- Komentari -->
    <div class="column">
        <h3>Komentari</h3>
        {{-- Ovde možeš prikazati komentare --}}
        <p>Nema komentara.</p>
    </div>

    <!-- Zahtev -->
    <div class="column">
        <h3>Zahtev {{ $ticket->id }}</h3>

        <div class="field">
            <strong>Naziv:</strong>
            <span>{{ $ticket->naziv  }}</span>
        </div>

        <div class="field">
            <strong>Opis:</strong>
            <span>{{ $ticket->sadrzaj }}</span>
        </div>

        <div class="field">
            <strong>Vrsta:</strong>
            <span>{{ $ticket->vrsta }}</span>
        </div>

        <div class="field">
            <strong>Prioritet:</strong>
            <span>{{ $ticket->prioritet }}</span>
        </div>

        <div class="field">
            <strong>Status:</strong>
            <span>{{ $ticket->status_zahteva }}</span>
        </div>

        <div class="field">
            <strong>Fajlovi:</strong>
            <span>/</span>
        </div>

    </div>

    <!-- Komunikacija -->
    <div class="column">
        <h3>Komunikacija</h3>
        {{-- Ovde možeš prikazati poruke --}}
        <p>Nema poruka.</p>
    </div>
</div>
<div class="actions">
    <!-- Leva kolona -->
    <div class="left">
        <a class="btn" href="{{ route('tickets.new_tickets') }}">Nazad na listu zahteva</a>
        <a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=conclusion">Zaključak</a>
    </div>

    <!-- Desna kolona -->
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
            @include('tickets.modals.message')
        @elseif(request('modal') === 'comment')
            @include('tickets.modals.comment')
        @elseif(request('modal') === 'status')
            @include('tickets.modals.status')
        @elseif(request('modal') === 'type')
            @include('tickets.modals.type')
        @elseif(request('modal') === 'reproduced')
            @include('tickets.modals.reproduced')
        @elseif(request('modal') === 'conclusion')
            @include('tickets.modals.conclusion')
        @endif

        <br>
        <a class="btn" href="{{ route('tickets.show', $ticket->id) }}">Zatvori</a>
    </div>
</div>
@endif

</body>
</html>
