<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php session_start() ?>
    <?php if (!isset($_SESSION["user_type"]) || $_SESSION["user_type"] == 0) {
        header("Location:./index.php");
    }
    ?>
    <?php
    require "./backend/db_connect.php";
    if (isset($_POST["deleteCar"])) {
        $mysqli->query("DELETE FROM cars WHERE id='" . $_POST["id"] . "'");
    }
    if (isset($_POST["return"])) {
        $car_id = $_POST["car_id"];
        $rental_id = $_POST["rental_id"];

        $unReserveCar = "UPDATE cars SET reserved=0 WHERE id='$car_id'";
        $mysqli->query($unReserveCar);

        $deleteRental = "DELETE FROM rentals WHERE id='$rental_id'";
        $mysqli->query($deleteRental);
    }
    if (isset($_POST["block"])) {
        $rental_id = $_POST["rental_id"];
        $query = "UPDATE rentals SET block=1 WHERE id=$rental_id";
        $mysqli->query($query);
    }
    if (isset($_POST["unBlock"])) {
        $rental_id = $_POST["rental_id"];
        $query = "UPDATE rentals SET block=0 WHERE id=$rental_id";
        $mysqli->query($query);
    }
    ?>
    <header>
        <div class="logo">
            <h1>Panel Administratora</h1>
        </div>
        <nav>
            <div class="menuElement"><a href="./index.php">Strona główna</a></div>
            <!-- <div class="menuElement"><a href="./addCar.php">Dodawanie auta</a></div> -->
            <?php if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == 2) : ?>
                <div class="menuElement"><a href="./adminUsers.php">Zarządzanie pracownikami</a></div>
            <?php endif ?>
            <div class="menuElement"><a href="./backend/logout.php">Wyloguj</a></div>
        </nav>
    </header>
    <div class="panel">
        <div class="formBox admin">
            <h2>Dodawanie auta</h2>
            <form action="./backend/addCar.php" method="post" enctype="multipart/form-data">
                <div class="column">
                    <div class="inputBox">
                        <label for="model">Model:</label>
                        <input type="text" name="model">
                    </div>
                    <div class="inputBox">
                        <label for="year">Rocznik:</label>
                        <input type="text" name="year" pattern="([0-9]{4})">
                    </div>
                    <div class="inputBox">
                        <label for="power">Moc:</label>
                        <input type="text" name="power">
                    </div>
                    <div class="inputBox">
                        <label for="price">Cena za dzień:</label>
                        <input type="text" name="price" pattern="\d*">
                    </div>
                    <div class="inputBox">
                        <label for="photo">Zdjęcie:</label>
                        <input type="file" name="photo">
                    </div>
                    <div class="submitBox">
                        <input type="submit" value="Dodaj">
                    </div>
                </div>
            </form>
        </div>
        <div class="tables">
            <div class="deletingCar">
                <table>
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>Rocznik</th>
                            <th>Moc</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    require "./backend/db_connect.php";
                    $all_cars = "SELECT * FROM CARS";
                    $cars_result = $mysqli->query($all_cars);
                    if ($cars_result->num_rows == 0) {
                        echo "<div>Brak samochodów</div>";
                    } else {
                        $cars_result->fetch_all(MYSQLI_ASSOC);
                        foreach ($cars_result as $car) {
                            echo "<tr>";

                            echo "<td>" . $car["model"] . "</td>";
                            echo "<td>" . $car["year"] . "</td>";
                            echo "<td>" . $car["power"] . "</td>";
                            echo "<td style='display:none'>" . $car["id"] . "</td>";
                            echo "<td>";
                            echo "<form action='#' method='POST'>";
                            echo "<input type=text name='id' value='" . $car["id"] . "' hidden>";
                            echo "<input type='submit' value='Usuń auto' class='delete'name='deleteCar'>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </table>
            </div>

            <div class="editRentals">
                <table>
                    <thead>
                        <tr>
                            <th>Imie nazwisko</th>
                            <th>Numer telefonu</th>
                            <th>Model</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php

                    $all_rentals = $mysqli->query("SELECT rentals.block,users.fullName, users.phoneNumber, cars.model,rentals.id,cars.id as car_id FROM users, cars,rentals WHERE users.id=rentals.user_id AND cars.id=rentals.car_id");
                    $all_rentals_fetched = $all_rentals->fetch_all(MYSQLI_ASSOC);
                    // echo json_encode($all_rentals_fetched);
                    foreach ($all_rentals_fetched as $single_rental) {
                        echo "<form action='#' method='POST'>";
                        echo "<td>" . $single_rental["fullName"] . "</td>";
                        echo "<td>" . $single_rental["phoneNumber"] . "</td>";
                        echo "<td>" . $single_rental["model"] . "</td>";
                        echo  "<input type='hidden' name='car_id' value='" . $single_rental["car_id"] . "'>";
                        echo  "<input type='hidden' name='rental_id' value='" . $single_rental["id"] . "'>";
                        echo "<td>";
                        echo "<input type='submit' value='Zwróć' class='delete' name='return'>";
                        echo "</td>";
                        echo "<td>";
                        if ($single_rental["block"] == 0) {
                            echo "<input type='submit' value='Zablokuj rezerwacje' class='delete' name='block'>";
                        } else {
                            echo "<input type='submit' value='Odblokuj rezerwacje' class='delete' name='unBlock'>";
                        }

                        echo "</td>";
                        echo "</form>";

                        echo "</tr>";
                    }

                    ?>
                </table>
            </div>
        </div>

    </div>
</body>

</html>