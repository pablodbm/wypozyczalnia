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

                <div class="photo singleCar">
                    <img src="./upload/fiat.jpg" alt="fiat">
                </div>
                <div class="info">
                                    <p>Rocznik: 2007</p>
                <p>Moc: 96KM</p>
                <p>Cena: 150zł/dzień</p>
                </div>

            </div>
            <div class="right">
                <?php
                    
                ?>
                <div class="userInfo">
                    <p>Imie: Paweł</p>
                    <p>Nazwisko: Słota</p>
                    <p>PESEL: 69696969696</p>
                    <p>Ulica: Bosacka</p>
                    <p>Numer mieszkania: 12/11</p>
                    <p>Miasto: Kraków</p>
                    <div class="button">
                        <a href="./backend/reserveCar.php">Rezerwuj teraz</a>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>