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
            justify-content: center;
            align-items: center;
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
            width: 260px;
            text-align: center;
            padding: 12px;
            border: 1px solid #000;
            background-color: #9acd66;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        .actions a:hover {
            background-color: #7fbf4d;
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
            <a href="{{ route('tickets.new_tickets') }}">
                Pregled liste zahteva
            </a>

            {{-- Pregled zahteva u statusu "Novi" --}}
            <a href="{{ route('tickets.delegate_ticket') }}">
                Pregled zahteva "Novi"
            </a>
        </div>
    </div>

</body>
</html>
