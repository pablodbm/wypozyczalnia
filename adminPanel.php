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
    if (isset($_POST["deleteCar"])) {
        require "./backend/db_connect.php";
        $mysqli->query("DELETE FROM cars WHERE id='" . $_POST["id"] . "'");
    }

    ?>
    <header>
        <div class="logo">
            <h1>Panel Administratora</h1>
        </div>
        <nav>
            <div class="menuElement"><a href="./index.php">Strona główna</a></div>
<<<<<<< HEAD
            <?php if (isset($_SESSION["user_type"])&&$_SESSION["user_type"] == 2) : ?>
            <div class="menuElement"><a href="./adminUsers.php">Zarządzanie pracownikami</a></div>
=======
            <div class="menuElement"><a href="./addCar.php">Dodawanie auta</a></div>
            <?php if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == 2) : ?>
                <div class="menuElement"><a href="./adminUsers.php">Zarządzanie pracownikami</a></div>
>>>>>>> e794938c0bf26823695ce1d09d05952c081a1bc5
            <?php endif ?>
            <div class="menuElement"><a href="./backend/logout.php">Wyloguj</a></div>
        </nav>
    </header>
    <div class="formBox admin">
        <h2>Dodawanie auta</h2>
        <form action="./backend/addCar.php" method="post">
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
                    <label for="photo">Zdjęcie:</label>
                    <input type="file" name="photo">
                </div>
                <div class="submitBox">
                    <input type="submit" value="Dodaj">
                </div>
            </div>
        </form>
    </div>
<<<<<<< HEAD

=======
    <div class="wypierdolenieFurmanki">
        <table>
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
                    echo "<input type='submit' value='usun auto' name='deleteCar'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <form action=""></form>
    </div>
>>>>>>> e794938c0bf26823695ce1d09d05952c081a1bc5
</body>

</html>