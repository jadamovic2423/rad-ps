<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Uspešno kreiran zahtev</title>

    <style>
        body {
            background: #dce8c8;
            font-family: Arial, sans-serif;
        }

        .box {
            width: 500px;
            margin: 150px auto;
            text-align: center;
        }

        .btn {
            margin-top: 30px;
            padding: 10px 20px;
            border: 2px solid #000;
            background: #8ccf6b;
            font-weight: bold;
            text-decoration: none;
            color: #000;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Ticketing sistem</h1>

    <h2>Uspešno ste kreirali novi zahtev!</h2>

    <p>
        Zahtev zaveden pod ID:
        <strong>{{ $ticketId }}</strong>
    </p>

    <a href="{{ route('home') }}" class="btn">
        Nazad na početni ekran
    </a>
</div>

</body>
</html>
