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

        .box h2 {
    font-size: 26px;      /* povećan font za naslov */
    font-weight: normal;  /* uklanja bold */
    margin-bottom: 20px;
}

.box p {
    font-size: 22px;      /* povećan font za tekst sa ID-jem */
}

.box p strong {
    font-weight: bold;    /* ID ostaje boldovan */
    font-size: 24px;      /* dodatno naglašen */
}

    </style>
</head>
<body>

<div class="box">
    <h1>Ticketing sistem</h1>

    <h2>Uspešno ste kreirali novi zahtev!</h2>

    <p>
        Zahtev zaveden pod ID:
        <strong>{{ sprintf('%04d', $ticketId) }}</strong>
    </p>

    <a href="{{ route('client.dashboard') }}" class="btn">
        Nazad na početni ekran
    </a>

</div>

</body>
</html>
