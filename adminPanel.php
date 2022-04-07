<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php session_start() ?>
    <?php if ($_SESSION["user_type"] == 0) {
        header("Location:./index.php");
    }
    ?>
    <h1>dodanie furmanki</h1>
    <form action="./backend/addCar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="model" id="">
        <input type="text" name="year" id="">
        <input type="text" name="power" id="">
        <input type="file" name="file" accept="image/png,image/jpeg">
        <input type="submit" value="dodaj furmanke">

    </form>

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