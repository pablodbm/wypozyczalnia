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
            <div class="menuElement"><a href="./addEmployee.php">Dodawanie pracownika</a></div>
            <?php endif ?>
            <div class="menuElement"><a href="./backend/logout.php">Wyloguj</a></div>
        </nav>
    </header>
    <div class="formBox">
        <h2>Dodawanie auta</h2>
        <form action="./backend/addCar.php" method="post">
            <div class="column">
                <div class="inputBox">
                    <label for="login">Login:</label>
                    <input type="text" name="login">
                </div>
                <div class="inputBox">
                    <label for="password">Hasło:</label>
                    <input type="password" name="password">
                </div>
                <div class="submitBox">
                    <input type="submit" value="Zaloguj się">
                </div>
            </div>

        </form>
    </div>
    <?php if ($_SESSION["user_type"] == 2) : ?>
        <h1>Dodanie pracownika</h1>
        <form action="./backend/add_employee.php" method="post">
            <input type="text" name="fullName" id="">
            <input type="text" name="login" id="">
            <input type="password" name="password" id="">
            <input type="submit" value="dodaj pracownika">
        </form>
    <?php endif ?>
</body>

</html>