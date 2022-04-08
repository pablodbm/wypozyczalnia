<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia - Moje konto</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php session_start(); ?>

<body>
    <header>
        <div class="logo">
            <h1>Moje rezerwacje</h1>
        </div>
        <nav>
            <div class="menuElement"><a href="./index.php">Strona główna</a></div>
            <div class="menuElement"><a href="./backend/logout.php">Wyloguj</a></div>
        </nav>
    </header>
    <main>
        <?php
        //wyswietlanie samochodów
        ?>
        <div class="cars">
            <?php
            require "./backend/db_connect.php";
            $cars_query = "SELECT * FROM cars WHERE reserved=0";
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
                echo "<p>Aktualny koszt: " . $car["price"] . "zł</p>"; // wyliczanie kosztów na podstawie ceny i długości wypożyczenia
                echo "<div class='button'>";
            ?>
                <?php if (!isset($_SESSION["fullName"])) : ?>
                    <a href="./loginForm.php">Zarezerwuj</a>
                <?php else : ?>
                    <a href="./singleCar.php?id=<?php echo $car['id']; ?>">Oddaj i zapłać</a>
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