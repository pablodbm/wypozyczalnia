<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>dodanie furmanki</h1>
    <form action="./backend/addCar.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="model" id="">
        <input type="text" name="year" id="">
        <input type="text" name="power" id="">
        <input type="file" name="file" accept="image/png,image/jpeg">
        <input type="submit" value="dodaj furmanke">

    </form>
</body>

</html>