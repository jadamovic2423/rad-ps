<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Pristup tiketing sistemu</title>
    <style>
        body {
            background-color: #dceacb;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 60px;
        }

        .box {
            background-color: #f6efe5;
            width: 350px;
            margin: 0 auto;
            border: 2px solid #444;
            padding: 20px;
            border-radius: 5px;
            text-align: left;
        }

        button {
            margin-top: 20px;
            padding: 10px 30px;
            background-color: #7fc85c;
            border: 1px solid #333;
            cursor: pointer;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
.form-row label {
    width: auto;       /* uklanjamo fiksnu širinu */
    margin-right: 5px; /* mali razmak do radio dugmadi */
    font-weight: bold;
}


        .form-row input[type="text"] {
            flex: 1;
            padding: 5px 0;
            border: none;
            border-bottom: 2px solid #333;
            background: transparent;
            outline: none;
        }

.radio-group {
    display: flex;
    align-items: center;
    gap: 8px;   /* razmak između klijent i product specijalista */
    margin-left: 0; /* uklanja dodatni razmak levo */
}

    </style>
</head>

<body>

<h1>Tiketing sistem</h1>
<h2>Pristup</h2>

<form action="{{ route('access.login') }}" method="POST">
    @csrf

    <div class="box">

        <!-- USERNAME ROW -->
        <div class="form-row">
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>

        <!-- ROLE ROW -->
        <div class="form-row">
            <label>Rola:</label>

            <div class="radio-group">
                <input type="radio" name="role" value="klijent" checked>
                <span>klijent</span>

                <input type="radio" name="role" value="product">
                <span>product specijalista</span>
            </div>
        </div>

    </div>

    <button type="submit">Pristupi</button>
</form>

</body>
</html>
