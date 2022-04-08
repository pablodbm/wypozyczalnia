<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php session_start(); ?>
    <?php if ($_SESSION["user_type"] != 2) {
        header("Location:./index.php");
    }
    ?>

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
    <div class="delete_empoyee">
        <form action="" method="post">
            <select name="single_employee" id="">
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
            <input type="submit" value="Usuń pracownika" name="delete">
        </form>
    </div>
</body>

</html>