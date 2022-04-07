<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Wypożyczalnia</h1>
        </div>
        <nav>
            <div class="menuElement"><a href="./index.php">Strona główna</a></div>
        </nav>
    </header>
    <main>
        <div class="rentformBox">
            <div class="left">
                <h2>Model: Fiat Bravo</h2>
                <p>Rocznik: 2007</p>
                <p>Moc: 96KM</p>
                <div class="photo">
                    <img src="./upload/fiat.jpg" alt="fiat">
                </div>
            </div>
            <div class="right">
                <form action="./backend/rentCarForm.php" method="post">
                    <div class="inputBox">
                        <label for="fullName">PESEL:</label>
                        <input type="text" name="fullName" pattern="([0-9]{11})">
                    </div>
                    <div class="inputBox">
                        <label for="fullName">Imię i nazwisko:</label>
                        <input type="text" name="fullName">
                    </div>
                    <div class="inputBox">
                        <label for="passwordRepeat">Powtórz hasło:</label>
                        <input type="password" name="passwordRepeat">
                    </div>
                    <div class="submitBox">
                        <input type="submit" value="Zarejestruj się">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>