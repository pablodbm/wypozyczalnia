<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page - Zarządzanie Pracownikami</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php session_start(); ?>
    <?php if ($_SESSION["user_type"] != 2) {
        header("Location:./index.php");
    }
    ?>
    <header>
        <div class="logo">
            <h1>Panel administratora</h1>
        </div>
        <nav>
            <div class="menuElement"><a href="./index.php">Strona główna</a></div>
            <div class="menuElement"><a href="./adminPanel.php">Zarządzanie autami</a></div>
            <div class="menuElement"><a href="./backend/logout.php">Wyloguj</a></div>
        </nav>
    </header>
    <div class="panel">
        <div class="formBox admin">
            <h2>Dodawanie pracownika</h2>
            <form action="./backend/addEmployee.php" method="post">
                <div class="column">
                    <div class="inputBox">
                        <label for="fullName">Imię i nazwisko:</label>
                        <input type="text" name="fullName">
                    </div>
                    <div class="inputBox">
                        <label for="login">Login:</label>
                        <input type="text" name="login">
                    </div>
                    <div class="inputBox">
                        <label for="password">Hasło:</label>
                        <input type="password" name="password">
                    </div>
                    <div class="inputBox">
                        <label for="passwordRepeat">Powtórz hasło:</label>
                        <input type="password" name="passwordRepeat">
                    </div>
                    <div class="submitBox">
                        <label for="" style="visibility: hidden;">Submit</label>
                        <input type="submit" value="Dodaj">
                    </div>
                </div>
                <div class="column">
                    <div class="inputBox">
                        <label for="birthDate">Data urodzenia:</label>
                        <input type="date" name="birthDate">
                    </div>
                    <div class="inputBox">
                        <label for="pesel">PESEL:</label>
                        <input type="text" name="pesel" pattern="([0-9]{11})">
                    </div>
                    <div class="inputBox">
                        <label for="street">Ulica:</label>
                        <input type="text" name="street">
                    </div>
                    <div class="inputBox">
                        <label for="buildingNumber">Numer budynku:</label>
                        <input type="text" name="buildingNumber">
                    </div>
                    <div class="inputBox">
                        <label for="city">Miasto:</label>
                        <input type="text" name="city">
                    </div>
                </div>
            </form>
        </div>
        <div class="formBox admin">
            <h2>Usuwanie pracownika</h2>
            <form action="./backend/deleteEmployee.php" method="post">
                <div class="column">
                    <div class="inputBox">
                        <label for="login">Wybierz pracownika:</label>
                        <select name="employee" id="">
                            <?php
                            require "./backend/db_connect.php";
                            $select_workers = "SELECT * FROM users WHERE user_type=1";
                            $result = $mysqli->query($select_workers);
                            $make_options = false;

                            if ($result->num_rows == 0) {
                                $result = $result->fetch_assoc();
                                $make_options = true;
                            } else if ($result->num_rows > 0) {
                                $result->fetch_all(MYSQLI_ASSOC);
                                $make_options = true;
                            } else {
                                echo "<div class='brak_pracownikow'>Brak pracowników</div>";
                            }
                            if ($make_options == true) {
                                foreach ($result as $single) {
                                    echo "<option value='" . $single["id"] . "'>" . $single["fullName"] . "</option>";
                                }
                            }
                            ?> </select>
                    </div>
                    <div class="submitBox">
                        <input type="submit" value="Usuń">
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>

</html>