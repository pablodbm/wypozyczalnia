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
        <button></button>
    </header>
    <main>
        <?php
        //wyswietlanie samochodów
        ?>
        <div class="cars">
            <?php

            $id = $_SESSION["id"];
            require "./backend/db_connect.php";
            $get_cars_id = "SELECT * FROM rentals where user_id='$id'";
            $get_cars_query = $mysqli->query($get_cars_id);
            if ($get_cars_query->num_rows == 0) {
                echo "<div>Brak wypożyczonych samochodów</div>";
            } else {
                if ($get_cars_query->num_rows == 1) {
                    $get_cars_fetched = $get_cars_query->fetch_assoc();
                    $id = $get_cars_fetched["car_id"];
                    $car_id = $get_cars_fetched["id"];
                    $cars_query = "SELECT * FROM cars WHERE id='$id' ";
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
                        // echo "<p>Aktualny koszt: " . $car["price"] . "zł</p>"; // wyliczanie kosztów na podstawie ceny i długości wypożyczenia
                        echo "<div class='button'>";
            ?>
                        <?php if (!isset($_SESSION["fullName"])) : ?>
                            <a href="./loginForm.php">Zarezerwuj</a>
                        <?php else : ?>
                            <a href="./backend/returnCar.php?car_id=<?php echo $id ?>&id=<?php echo $car_id; ?>">Oddaj</a>
                        <?php endif; ?>
                        <?php
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    $get_cars_fetched = $get_cars_query->fetch_all(MYSQLI_ASSOC);
                    // echo var_dump($get_cars_fetched);

                    foreach ($get_cars_fetched as $single_car) {
                        // echo var_dump($single_car[0]);
                        echo "<br>";
                        $id = $single_car["car_id"];
                        $car_id = $single_car["id"];
                        $cars_query = "SELECT * FROM cars WHERE id='$id' ";
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
                            // echo "<p>Aktualny koszt: " . $car["price"] . "zł</p>"; // wyliczanie kosztów na podstawie ceny i długości wypożyczenia
                            echo "<div class='button'>";
                        ?>
                            <?php if (!isset($_SESSION["fullName"])) : ?>
                                <a href="./loginForm.php">Zarezerwuj</a>
                            <?php else : ?>
                                <a href="./backend/returnCar.php?car_id=<?php echo $id ?>&id=<?php echo $car_id; ?>">Oddaj</a>
                            <?php endif; ?>
            <?php
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                }
            }
            ?>

        </div>
    </main>
    <footer>

    </footer>
</body>

</html>