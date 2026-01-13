<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Novi zahtev - Obaveštenje</title>

    <style>
        body {
            background: #dce8c8;
            font-family: Arial, sans-serif;
        }

        .modal {
            width: 420px;
            margin: 120px auto;
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
    </style>
</head>
<body>

<div class="modal">
    <h3>Obaveštenje</h3>

    <p>
        Polja naziv, opis, vrsta i/ili prioritet nisu popunjeni.
    </p>

    <button class="btn" onclick="window.history.back()">
        U redu
    </button>
</div>

</body>
</html>
