<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Novi zahtev</title>
    <style>
        body {
            background-color: #dceacb;
            font-family: Arial, sans-serif;
            padding: 40px;
            text-align: center;
        }
        .container {
            margin: 0 auto;
            width: 600px;
            text-align: left;
        }
        .left, .right {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }
        button {
            margin-top: 20px;
            padding: 10px 30px;
            background-color: #7fc85c;
            border: 1px solid #333;
            cursor: pointer;
        }
        .cancel {
            background-color: #ddd;
        }
    </style>
</head>

<body>

<h1>Tiketing sistem</h1>
<h2>Novi zahtev forma</h2>

<div class="container">

<form action="{{ route('client.ticket.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="left">
        <label>Naziv:</label><br>
        <input type="text" name="naziv" required><br><br>

        <label>Vrsta:</label><br>
        <select name="vrsta" required>
            <option value="">odaberite</option>
            <option value="bug">bug</option>
            <option value="razvoj">novi razvoj</option>
            <option value="regulativa">regulativa</option>
        </select><br><br>

        <label>Prioritet:</label><br>
        <select name="prioritet" required>
            <option value="">odaberite</option>
            <option value="nizak">nizak</option>
            <option value="normalan">normalan</option>
            <option value="visok">visok</option>
            <option value="kritican">kritičan</option>
        </select><br><br>

        <label>Priloži fajl:</label><br>
        <input type="file" name="fajl">
    </div>

    <div class="right">
        <label>Opis:</label><br>
        <textarea name="sadrzaj" rows="10" cols="30" required></textarea>
    </div>

    <br><br>

    <a href="{{ route('client.home') }}">
        <button type="button" class="cancel">Odustani</button>
    </a>

    <button type="submit">Kreiraj</button>

</form>

</div>

</body>
</html>
