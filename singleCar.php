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
        <?php if (isset($_GET["id"])) : ?>
            <?php
            require "./backend/db_connect.php";
            $car_id = $_GET["id"];
            $get_car = "SELECT * FROM cars WHERE id='$car_id'";
            $car = $mysqli->query($get_car);
            if ($car->num_rows == 0) {
                header("Location:./index.php");
            } else {
                $car = $car->fetch_assoc();
            }
            ?>
            <div class="rentformBox">
                <div class="left">
                    <h2>Model: <?php echo $car["model"] ?></h2>

                    <div class="photo singleCar">
                        <img src="<?php echo $car["photo"] ?>" alt="fiat">
                    </div>
                    <div class="info">
                        <p>Rocznik: <?php echo $car["year"] ?></p>
                        <p>Moc: <?php echo $car["power"] ?>KM</p>
                        <p>Cena: <?php echo $car["price"] ?>zł/dzień</p>
                    </div>

                </div>
                <div class="right">
                    <?php
                    session_start();
                    $user_data = json_decode($_SESSION["user_data"], true);
                    $imie = $user_data["fullName"];
                    // echo $imie;
                    $imie = explode(" ", $user_data["fullName"]);
                    $user_id = $user_data["id"];
                    $car_id = $_GET["id"];
                    ?>
                    <div class="userInfo">
                        <p>Imie: <?php echo $imie[0] ?></p>
                        <p>Nazwisko: <?php echo $imie[1] ?></p>
                        <p>PESEL: <?php echo $user_data["pesel"] ?></p>
                        <p>Ulica: <?php echo $user_data["street"] ?></p>
                        <p>Numer mieszkania: <?php echo $user_data["buildingNumber"] ?></p>
                        <p>Miasto: <?php echo $user_data["city"] ?></p>
                        <div class="button">
                            <a href="./backend/reserveCar.php?user_id=<?php echo $user_id ?>&car_id=<?php echo $car_id ?>">Rezerwuj teraz</a>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>

    </main>
</body>

</html>