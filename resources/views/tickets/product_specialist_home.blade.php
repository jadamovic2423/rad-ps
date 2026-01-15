<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Tiketing sistem – Početni ekran</title>

    {{-- CSS unutar blade fajla --}}
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #dfeacd;
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logout a {
            padding: 8px 14px;
            border: 1px solid #000;
            text-decoration: none;
            color: #000;
            background-color: #e6e6e6;
            font-size: 14px;
        }

        .container {
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 60px;   /* podiže sadržaj ka vrhu */
    gap: 20px;           /* razmak između elemenata */
}


        h1 {
            margin-bottom: 10px;
        }

        h2 {
            margin-bottom: 40px;
            font-weight: normal;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

     .actions a {
    display: inline-block;
    width: fit-content;       /* širina prati dužinu teksta */
    text-align: center;
    padding: 12px 25px;       /* unutrašnji razmak */
    border: 2px solid #000;
    background-color: #9acd66;
    text-decoration: none;
    color: #000;
    font-weight: bold;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
}

.logout {
    position: absolute;
    top: 20px;
    right: 20px;
    border: 2px solid #000;   /* jača bordura */
    padding: 8px 12px;
    background: #ddd;         /* siva pozadina */
    font-weight: bold;        /* boldovan tekst */
    font-size: 18px;
}

    </style>
</head>
<body>

    {{-- Izloguj se --}}
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout">Izloguj se</button>
    </form>


    <div class="container">
        <h1>Tiketing sistem</h1>
        <h2>Početni ekran</h2>

        <div class="actions">
            {{-- Pregled svih zahteva --}}
            <a href="{{ route('tickets.list') }}">
                Pregled liste zahteva
            </a>

            {{-- Pregled zahteva u statusu "Novi" --}}
            <a href="{{ route('tickets.new_tickets') }}">
                Pregled zahteva "Novi"
            </a>

        </div>
    </div>

</body>
</html>
