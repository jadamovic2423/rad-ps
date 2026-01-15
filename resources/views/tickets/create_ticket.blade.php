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
            width: 60%;          /* zauzima 60% širine ekrana */
            max-width: 900px;    /* da ne ode previše široko na velikim ekranima */
            min-width: 600px;    /* da ne bude previše usko na manjim ekranima */
            text-align: left;
        }

        /* dve kolone */
        .form-columns {
            display: flex;
            justify-content: space-between;
            gap: 40px; /* razmak između kolona */
        }
        .left, .right {
            flex: 1;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
        .form-row label {
            margin-right: 8px;   /* minimalan razmak, kao 1–2 spejsa */
            font-weight: bold;
            font-size: 20px;
        }

        .form-row .line-input {
            width: 340px;          /* fiksna širina linije */
            border: none;
            border-bottom: 1px solid #333;
            background: transparent;
            padding: 6px 0;
            font-size: 20px;
            outline: none;
        }

        select, textarea {
            font-size: 20px;
            padding: 6px;
            flex: 1;
        }

        .form-row input[type="file"] {
            flex: 1;
            font-size: 20px;
        }
        .upload-icon {
            font-size: 24px;
            cursor: pointer;
            color: #333;
            margin-left: 10px;
        }
        input[type="file"] {
            display: none; /* sakrij default file input */
        }

        .button-row {
            display: flex;
            justify-content: space-between; /* jedno levo, drugo desno */
            margin-top: 30px;
        }

        .button-row a {
            display: block;
            width: fit-content;   /* link prati širinu dugmeta */
            text-decoration: none;
            color: black;
        }

        .button-row button {
            font-size: 18px;
            padding: 10px 30px;
            border: 2px solid #000;
            font-weight: bold;
            cursor: pointer;
        }

        /* Odustani dugme */
        .cancel {
            background-color: #ddd;
            color: black;
        }

        /* Kreiraj dugme */
        .create {
            background-color: #7fc85c;
            color: black;
        }


        .form-row select {
            font-size: 20px;
            padding: 6px;
            width: auto;       /* selektor zauzima širinu sadržaja */
            flex: 0;           /* sprečava razvlačenje */
        }

        textarea.notebook {
            width: 100%;
            height: auto;
            min-height: 140px;       /* visina za ~5 linija */
            background: transparent; /* nema pozadine */
            border: none;            /* nema okvira */
            resize: none;
            font-size: 20px;
            line-height: 28px;       /* razmak između linija */
            outline: none;
            padding: 0;
            /* crtamo linije pomoću repeating-linear-gradient */
            background-image: repeating-linear-gradient(
                to bottom,
                transparent 0px,
                transparent 27px,
                #333 28px
            );
            background-size: 100% 28px;
        }

        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }
        .modal {
            width: 420px;
            background: #f5efe6;
            border: 2px solid #000;
            padding: 20px;
            text-align: center;
        }
        .modal h3 {
            margin-bottom: 15px;
        }
        .btn {
            background: #8ccf6b;
            border: 2px solid #000;
            padding: 8px 18px;
            cursor: pointer;
            font-weight: bold;
        }

        .form-row label,
        .form-row .line-input,
        textarea.notebook,
        .form-row input[type="file"] {
            font-size: 24px;
        }
        .form-row select {
            font-size: 16px;   /* manji font za liste */
            padding: 6px;
            width: auto;
            flex: 0;
        }

/* Labeli i polja */
.form-row label,
.form-row .line-input,
textarea.notebook,
.form-row input[type="file"],
.form-row select {
    font-weight: normal;   /* uklanja bold */
    font-size: 24px;       /* veći font za čitljivost */
}

/* Dugmad ostaju boldovana */
.button-row button {
    font-size: 18px;
    font-weight: bold;     /* ostaje bold */
    padding: 10px 30px;
    border: 2px solid #000;
    cursor: pointer;
}

.section-title {
    font-weight: normal;   /* uklanja bold */
    font-size: 22px;
    text-align: left;
    margin-left: calc(50% - 116px); /* pomeraj kao kod dugmeta */
}

 h2 {
            font-weight: normal;      /* uklanja bold sa naslova "Početni ekran" */
        }

.form-row select {
    font-size: 18px;   /* veličina za sam dropdown */
    padding: 6px;
    width: auto;
    flex: 0;
    background: #eef7c4;
}

.form-row select option {
    font-size: 16px;   /* veličina za stavke u listi, uključujući "odaberite" */
}


    </style>
</head>

<body>

<h1>Tiketing sistem</h1>
<h2>Novi zahtev forma</h2>

<div class="container">

<form action="{{ route('client.ticket.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-columns">
        <!-- leva kolona -->
        <div class="left">
            <div class="form-row">
                <label for="naziv">Naziv:</label>
                <input type="text" name="naziv" id="naziv" class="line-input">
            </div>

            <div class="form-row">
                <label for="vrsta">Vrsta:</label>
                <select name="vrsta" id="vrsta">
                    <option value="">odaberite</option>
                    <option value="bug">bug</option>
                    <option value="novi razvoj">novi razvoj</option>
                    <option value="regulativa">regulativa</option>
                </select>
            </div>

            <div class="form-row">
                <label for="prioritet">Prioritet:</label>
                <select name="prioritet" id="prioritet">
                    <option value="">odaberite</option>
                    <option value="nizak">nizak</option>
                    <option value="normalan">normalan</option>
                    <option value="visok">visok</option>
                    <option value="kritican">kritičan</option>
                </select>
            </div>

            <div class="form-row">
                <label for="fajl">Priloži fajl:</label>
                <input type="file" name="fajl" id="fajl">
                <label for="fajl" class="upload-icon">📤</label>
            </div>
        </div>

        <!-- desna kolona -->
        <div class="right">
            <div class="form-row" style="align-items:flex-start;">
                <div class="form-row" style="align-items:flex-start;">
                    <label for="sadrzaj">Opis:</label>
                    <textarea name="sadrzaj" id="sadrzaj" class="notebook" rows="5"></textarea>
                </div>

            </div>
        </div>
    </div>

    <div class="button-row">
        <a href="{{ route('client.dashboard') }}">
            <button type="button" class="cancel">Odustani</button>
        </a>
        <button type="submit" class="create">Kreiraj</button>
    </div>

    </form>  {{-- <- zatvaranje forme ovde --}}

    {{-- ALERT MODAL --}}
    @if(session('alert'))
    <div class="overlay">
        <div class="modal">
            <h3>Obaveštenje</h3>
            <p>{{ session('alert') }}</p>
            <button class="btn" onclick="document.querySelector('.overlay').style.display='none'">
                U redu
            </button>
        </div>
    </div>
    @endif
