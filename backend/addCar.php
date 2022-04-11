<?php
require "./db_connect.php";

$model = mysqli_real_escape_string($mysqli, $_POST["model"]);
$year = mysqli_real_escape_string($mysqli, $_POST["year"]);
$power = mysqli_real_escape_string($mysqli, $_POST["power"]);
$price = mysqli_real_escape_string($mysqli, $_POST["price"]);


$target_dir = "../upload/";
$filename = $_FILES["photo"]["tmp_name"];
if ($_FILES["photo"]["type"] == "image/jpeg") {
    $extension = ".jpg";
} else {
    $extension = ".png";
}

$target_file = $target_dir . uniqid() . $extension;
if (!file_exists($target_file)) {
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
}
$path_to_photo = substr($target_file, 1);

$add_car = "INSERT INTO cars (price,model,year,power,photo) VALUES ('$price','$model','$year','$power','$path_to_photo')";
$mysqli->query($add_car);
header("Location:../index.php");
