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
        }
        button {
            margin-top: 20px;
            padding: 10px 30px;
            background-color: #7fc85c;
            border: 1px solid #333;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>Tiketing sistem</h1>
    <h2>Pristup</h2>

    <form action="{{ route('access.login') }}" method="POST">
        @csrf

        <div class="box">

            <label>Username:</label><br>
            <input type="text" name="username" required><br><br>

            <label>Rola:</label><br>
            <input type="radio" name="role" value="klijent" checked> klijent
            <input type="radio" name="role" value="product"> product specijalista
        </div>

        <button type="submit">Pristupi</button>
    </form>

</body>
</html>
