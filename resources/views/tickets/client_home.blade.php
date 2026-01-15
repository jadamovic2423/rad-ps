<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Početni ekran</title>
    <style>
        body {
            background-color: #dceacb;
            text-align: center;
            padding-top: 60px;
            font-family: Arial, sans-serif;
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
            border: 2px solid #000;   /* jača bordura */
            padding: 8px 12px;
            background: #ddd;
            font-weight: bold;        /* boldovan tekst */
        }

        h2 {
            font-weight: normal;      /* uklanja bold sa naslova "Početni ekran" */
        }


        .button-column {
            display: flex;
            flex-direction: column; /* vertikalni raspored */
            align-items: center;    /* centrirano po horizontali */
            gap: 2em;              /* razmak između dugmadi */
        }

        a {
            display: block;         /* svaki link zauzima ceo red */
            width: fit-content;     /* širina linka prati dugme */
            text-decoration: none;
            color: black;
        }

        button {
            display: block;
            padding: 12px 25px;
            background-color: #7fc85c;
            border: 2px solid #000;
            cursor: pointer;
            color: black;
            font-weight: bold;
            font-size: 18px;
            white-space: nowrap;    /* sprečava prelazak u novi red */
            text-align: left;       /* tekst poravnat levo */
        }



        .left-align {
            margin-left: calc(50% - 116px); /* pomera dugme ulevo, ali ostaje centrirano */
        }

        .section-title {
            font-weight: normal;
            font-size: 22px;
            margin-left: calc(50% - 150px); /* poravnato sa dugmadima širine 250px */
            text-align: left;
        }


    </style>
</head>

<body>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout">Izloguj se</button>
    </form>

    <h1>Tiketing sistem</h1>
    <h2 class="section-title">Početni ekran</h2>

    <div class="button-column">
        <a href="{{ route('client.ticket.create') }}">
            <button type="button" class="left-align">+ Novi zahtev</button>
        </a>

        <a href="{{ route('client.ticket.list') }}">
            <button type="button">Pregled liste zahteva</button>
        </a>
    </div>
</body>
</html>
