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
    <?php if ($_SESSION["user_type"] == 0) {
        header("Location:./index.php");
    }
    ?>
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
                <div class="menuElement"><a href="./backend/logout.php">Wyloguj</a></div>
            <?php endif; ?>
        </nav>
    </header>
    <form action="./backend/addCar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="model" id="">
        <input type="text" name="year" id="">
        <input type="text" name="power" id="">
        <input type="file" name="file" accept="image/png,image/jpeg">
        <input type="submit" value="dodaj furmanke">
    </form>

    <div class="add_employee">
        <?php if ($_SESSION["user_type"] == 2) : ?>
            <h1>Dodanie pracownika</h1>
            <form action="./backend/add_employee.php" method="post">
                <input type="text" name="fullName" id="">
                <input type="text" name="login" id="">
                <input type="password" name="password" id="">
                <input type="submit" value="dodaj pracownika">
            </form>
        <?php endif ?>
    </div>
    <?php
    require "./backend/db_connect.php";
    $select_workers = "SELECT * FROM users WHERE user_type=1";
    $result = $mysqli->query($select_workers);

    ?>
</body>

</html>