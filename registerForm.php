<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia - rejestracja</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="formBox">
        <h2>Rejestracja</h2>
        <form action="./backend/register.php" method="post">
            <div class="inputBox">
                <label for="fullName">Imię i nazwisko:</label>
                <input type="text" name="fullName">
            </div>
            <div class="inputBox">
                <label for="login">Login:</label>
                <input type="text" name="login">
            </div>
            <div class="inputBox">
                <label for="password">Hasło:</label>
                <input type="password" name="password">
            </div>
            <div class="inputBox">
                <label for="passwordRepeat">Powtórz hasło:</label>
                <input type="password" name="passwordRepeat">
            </div>
            <div class="inputBox">
                <label for="birthDate">Data urodzenia:</label>
                <input type="date" name="birthDate">
            </div>
            <div class="inputBox">
                <label for="pesel">PESEL:</label>
                <input type="text" name="pesel" pattern="([0-9]{11})">
            </div>
            <div class="inputBox">
                <label for="street">Ulica:</label>
                <input type="text" name="street">
            </div>
            <div class="inputBox">
                <label for="buildingNumber">Numer budynku:</label>
                <input type="text" name="buildingNumber">
            </div>
            <div class="inputBox">
                <label for="city">Miasto:</label>
                <input type="text" name="city">
            </div>
            <div class="submitBox">
                <input type="submit" value="Zarejestruj się">
            </div>
        </form>
    </div>

</body>
</html>