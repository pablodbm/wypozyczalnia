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
            <?php if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] != 0) : ?>
                <div class="menuElement"><a href="./adminPanel.php">Panel administratora</a></div>
            <?php endif ?>
            <?php if (!isset($_SESSION["fullName"])) : ?>
                <div class="menuElement"><a href="./loginForm.php">Logowanie</a></div>
                <div class="menuElement"><a href="./registerForm.php">Rejestracja</a></div>
            <?php else : ?>
                <div class="menuElement"><a href="./myAccount.php">Moje konto</a></div>
                <div class="menuElement"><a href="./backend/logout.php">Wyloguj</a></div>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <?php
        //wyswietlanie samochodów
        ?>
        <div class="cars">
            <div class="car websiteInfo">
                <h2>Z nami zarezerwujesz samochód w 2 krokach</h2>
                <div class="infoBox">
                    <p>1. Utwórz konto i podaj prawdziwe dane.</p>
                    <p>2. Zarezerwuj samochów.</p>
                    <p>A my sami do Ciebie zadzwonimy!</p>
                </div>

            </div>
            <?php
            require "./backend/db_connect.php";
            $cars_query = "SELECT * FROM cars WHERE reserved=0";
            //zapytanie - wybór z rezerwacji
            $cars = $mysqli->query($cars_query);
            $cars_fetched = $cars->fetch_all(MYSQLI_ASSOC);
            foreach ($cars_fetched as $car) {
                echo "<div class='car'>";
                echo "<h2>Model: " . $car["model"] . "</h2>";
                echo "<p>Rocznik: " . $car["year"] . "</p>";
                echo "<p>Moc: " . $car["power"] . " hp" . "</p>";
                echo "<div class='photo'>";
                echo "<img src='" . $car["photo"] . "' alt='fiat'>";
                echo "</div>";
                echo "<div class='priceNButton'>";
                echo "<p>Cena: " . $car["price"] . "zł/dzień</p>";
                echo "<div class='button'>";
            ?>
                <?php if (!isset($_SESSION["fullName"])) : ?>
                    <a href="./loginForm.php">Zarezerwuj</a>
                <?php else : ?>
                    <a href="./singleCar.php?id=<?php echo $car['id']; ?>">Zarezerwuj</a>
                <?php endif; ?>
            <?php
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>

        </div>
    </main>
    <footer>

    </footer>
</body>

</html>