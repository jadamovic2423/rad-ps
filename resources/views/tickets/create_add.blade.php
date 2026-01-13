<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Novi zahtev</title>

    <style>
        body {
            background: #dce8c8;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 700px;
            margin: 50px auto;
        }

        h1, h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 6px;
            margin-top: 5px;
            border: 1px solid #000;
        }

        textarea {
            height: 80px;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 10px 20px;
            border: 2px solid #000;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            color: #000;
            background: #8ccf6b;
        }

        .btn.cancel {
            background: #cfdac0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Ticketing sistem</h1>
    <h2>Novi zahtev forma</h2>

    <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Naziv:</label>
        <input type="text" name="title">

        <label>Opis:</label>
        <textarea name="description"></textarea>

        <label>Vrsta:</label>
        <select name="type">
            <option value="">-- izaberite --</option>
            <option value="bug">Bug</option>
            <option value="feature">Feature</option>
            <option value="support">Support</option>
        </select>

        <label>Prioritet:</label>
        <select name="priority">
            <option value="">-- izaberite --</option>
            <option value="nizak">Nizak</option>
            <option value="srednji">Srednji</option>
            <option value="visok">Visok</option>
        </select>

        <label>Priloži fajl:</label>
        <input type="file" name="attachment">

        <div class="buttons">
            <a href="{{ route('home') }}" class="btn cancel">Odustani</a>
            <button type="submit" class="btn">Kreiraj</button>
        </div>
    </form>
</div>

</body>
</html>
