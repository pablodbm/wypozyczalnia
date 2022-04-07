<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php session_start(); ?>

<body>
    <header>
        <div class="logo">
            <h1>Wypożyczalnia</h1>
        </div>
        <nav>
            <div class="menuElement"><a href="./index.php">Strona główna</a></div>
            <?php if (!isset($_SESSION["fullName"])) : ?>
                <div class="menuElement"><a href="./loginForm.php">Logowanie</a></div>
                <div class="menuElement"><a href="./registerForm.php">Rejestracja</a></div>
            <?php else : ?>
                <div class="menuElement"><a href="">Moje konto</a></div>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <?php
        //wyswietlanie samochodów
        ?>
        <div class="cars">
            <div class="car">
                <h2>Model: Fiat Bravo</h2>
                <p>Rocznik: 2007</p>
                <p>Moc: 96KM</p>
                <div class="photo">
                    <img src="./upload/fiat.jpg" alt="fiat">
                </div>
                <div class="priceNButton">
                    <p>Cena: 150zł/dzień</p>
                    <div class="button">
                        <a href="./singleCar.php">Zarezerwuj</a>
                    </div>
                </div>
            </div>
            <div class="car">
                <h2>Model: Fiat Bravo</h2>
                <p>Rocznik: 2007</p>
                <p>Moc: 96KM</p>
                <div class="photo">
                    <img src="./upload/fiat.jpg" alt="fiat">
                </div>
                <div class="priceNButton">
                    <p>Cena: 150zł/dzień</p>
                    <div class="button">
                        <a href="./singleCar.php">Zarezerwuj</a>
                    </div>
                </div>
            </div>
            <div class="car">
                <h2>Model: Fiat Bravo</h2>
                <p>Rocznik: 2007</p>
                <p>Moc: 96KM</p>
                <div class="photo">
                    <img src="./upload/fiat.jpg" alt="fiat">
                </div>
                <div class="priceNButton">
                    <p>Cena: 150zł/dzień</p>
                    <div class="button">
                        <a href="./singleCar.php">Zarezerwuj</a>
                    </div>
                </div>
            </div>
            <div class="car">
                <h2>Model: Fiat Bravo</h2>
                <p>Rocznik: 2007</p>
                <p>Moc: 96KM</p>
                <div class="photo">
                    <img src="./upload/fiat.jpg" alt="fiat">
                </div>
                <div class="priceNButton">
                    <p>Cena: 150zł/dzień</p>
                    <div class="button">
                        <a href="./singleCar.php">Zarezerwuj</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>