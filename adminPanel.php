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
    <header>
        <div class="logo">
            <h1>Wypożyczalnia</h1>
        </div>
        <nav>
            <div class="menuElement"><a href="./index.php">Strona główna</a></div>
            <div class="menuElement"><a href="./addCar.php">Dodawanie auta</a></div>
            <?php if (isset($_SESSION["user_type"])&&$_SESSION["user_type"] == 2) : ?>
            <div class="menuElement"><a href="./addEmployee.php">Zarządzanie pracownikami</a></div>
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
    <?php
    require "./backend/db_connect.php";
    $select_workers = "SELECT * FROM users WHERE user_type=1";
    $result = $mysqli->query($select_workers);

    ?>
</body>

</html>