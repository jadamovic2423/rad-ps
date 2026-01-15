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

        /* overlay sloj preko stranice */
        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.3); /* poluprozirna pozadina */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal {
            width: 420px;
            background: #f5efe6;
            border: 2px solid #000;
            padding: 20px;
            text-align: center;
            z-index: 1000; /* da bude iznad svega */
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

<div class="overlay">
    <div class="modal">
        <h3>Obaveštenje</h3>
        <p>Polja naziv, opis, vrsta i/ili prioritet nisu popunjeni.</p>
        <button class="btn" onclick="window.history.back()">U redu</button>
    </div>
</div>

</body>
</html>
