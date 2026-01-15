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

.pagination {
    display: flex;
    justify-content: center;
    gap: 6px;
    list-style: none;
    padding: 0;
}

.pagination li a,
.pagination li span {
    display: inline-block;
    width: 20px;       
    height: 20px;      
    line-height: 22px; 
    font-size: 12px;  
    text-align: center;
    border-radius: 50%;
    background: #8bc34a;
    color: #000;
    font-weight: bold;
    text-decoration: none;
    border: 1px solid #333;
}


.pagination li.active span {
    background: #333;
    color: #fff;
}

.column {
    display: flex;
    flex-direction: column;   /* vertikalni raspored */
}

.column .content {
    flex: 1;                  /* zauzima sav prostor iznad */
}

.column .pagination {
    margin-top: auto;         /* gura paginaciju na dno */
    justify-content: center;
    align-self: center;       /* centriraj horizontalno */
}


.column .messages {
    flex: 1;                  /* zauzima sav prostor iznad */
}

.btn,
button.btn {
    display: inline-block;
    padding: 6px 12px;
    background: #8bc34a;
    border: 2px solid #000;   
    text-decoration: none;
    color: #000;
    font-size: 22px;
    font-weight: bold;
    white-space: nowrap;
}

/* Labela normalna, vrednost boldovana */
.field label {
    font-weight: normal;
    font-size: 22px;
    margin: 0;
    white-space: nowrap;
}

.field strong {
    font-weight: bold;
    font-size: 22px;
}


.field strong,
.field span {
    font-size: 22px;             
    white-space: normal;         
    word-break: break-word;      
    flex: 1;                     
}
.field-line {
    font-size: 18px;
    margin-bottom: 10px;
    line-height: 1.4;
}

.field-line .label {
    font-weight: normal;
    white-space: nowrap;
    margin-right: 6px;
    font-size:22px;
}

.field-line .value {
    font-weight: bold;
    word-break: break-word;
}


.column {
    display: block;      /* umesto flex, da sadržaj ide prirodno */
}

.btn.disabled {
    background: #ccc;           /* siva pozadina */
    color: #666;                /* tamnosiva slova */
    border: 2px solid #999;     /* svetlosiva ivica */
    cursor: not-allowed;        /* pokazivač kao za disabled */
    font-weight: bold;
}
.field strong,
.field span,
.field-line .value {
    font-size: 18px;       /* ujednačeno za sve vrednosti */
    white-space: normal;
    word-break: break-word;
    flex: 1;
}

    </style>
</head>
<body>
<h1 style="text-align:center; font-size:28px; margin:20px 0; font-weight:bold;"> Tiketing sistem </h1>
<div class="container">
    <!-- Komentari -->
       <div class="column">
            <h3>Komentari</h3>
            <div class="content">
                @foreach($komentari as $repro)
                    @if($repro->komentar)
                        <p>PS {{ $repro->created_at->format('d.m.Y H:i') }}: {{ $repro->komentar }}</p>
                    @endif
                @endforeach

                @if($komentari->isEmpty())
                    <p>Nema komentara.</p>
                @endif
            </div>

            {{-- paginacija za komentare --}}
            <div class="pagination">
                {{ $komentari->links('pagination::bootstrap-5') }}
            </div>
        </div>


    <!-- Zahtev -->
    <div class="column">
        <h3>Zahtev {{ str_pad($ticket->id, 4, '0', STR_PAD_LEFT) }}</h3>


        <p class="field-line">
            <span class="label">Naziv:</span>
            <span class="value">{{ $ticket->naziv }}</span><br>
            <span class="label">Opis:</span>
            <span class="value">{{ $ticket->sadrzaj }}</span>
        </p>

        <div class="field"><label>Vrsta:</label> <strong>{{ $ticket->vrsta }}</strong></div>
        <div class="field"><label>Prioritet:</label> <strong>{{ $ticket->prioritet }}</strong></div>
        <div class="field"><label>Status:</label> <strong>{{ $ticket->status_zahteva }}</strong></div>
        <div class="field"><label>Fajlovi:</label> <strong>{{ $ticket->fajl ?? '/' }}</strong></div>


    </div>

    <!-- Komunikacija -->
    <div class="column">
        <h3>Komunikacija</h3>
        <div class="content">
            @foreach($obrada as $o)
                @if($o->komentar_product_sp)
                    <p>PS {{ $o->created_at->format('d.m.Y H:i') }}: {{ $o->komentar_product_sp }}</p>
                @endif
                @if($o->komentar_klijenta)
                    <p>K {{ $o->created_at->format('d.m.Y H:i') }}: {{ $o->komentar_klijenta }}</p>
                @endif
            @endforeach

            @if($obrada->isEmpty())
                <p>Nema poruka.</p>
            @endif
        </div>

        {{-- paginacija za komunikaciju --}}
        <div class="pagination">
            {{ $obrada->links('pagination::bootstrap-5') }}
        </div>
    </div>

</div>

<div class="actions">
    <div class="left">
        <a class="btn" href="{{ route('tickets.list') }}">Nazad na listu zahteva</a>

        @if($ticket->reprodukovanja->isNotEmpty())
            <a class="btn" href="{{ route('tickets.show', $ticket->id) }}?modal=conclusion">
                Zaključak
            </a>
        @else
            <span class="btn disabled">Zaključak</span>
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
