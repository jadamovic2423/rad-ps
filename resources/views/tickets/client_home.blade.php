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
        button {
            display: block;
            margin: 15px auto;
            padding: 12px 25px;
            background-color: #7fc85c;
            border: 1px solid #333;
            cursor: pointer;
            width: 200px;
        }
        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
            border: 1px solid #333;
            padding: 8px 12px;
            background: #ddd;
        }
    </style>
</head>

<body>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout">Izloguj se</button>
    </form>

    <h1>Tiketing sistem</h1>
    <h2>Početni ekran</h2>

    <a href="{{ route('client.ticket.create') }}">
        <button type="button">+ Novi zahtev</button>
    </a>

    <a href="{{ route('client.ticket.list') }}">
        <button type="button">Pregled liste zahteva</button>
    </a>

</body>
</html>
