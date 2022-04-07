<?php
require "./db_connect.php";

$model = mysqli_real_escape_string($mysqli, $_POST["model"]);
$year = mysqli_real_escape_string($mysqli, $_POST["year"]);
$power = mysqli_real_escape_string($mysqli, $_POST["power"]);

$target_dir = "../upload/";
$filename = $_FILES["file"]["tmp_name"];
if ($_FILES["file"]["type"] == "image/jpeg") {
    $extension = ".jpg";
} else {
    $extension = ".png";
}

$target_file = $target_dir . uniqid() . $extension;
if (!file_exists($target_file)) {
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
}
echo $target_file . "<br>";
$path_to_photo = substr($target_file, 1);
echo $path_to_photo;

$add_car = "INSERT INTO cars (model,year,power,photo) VALUES ('$model','$year','$power','$path_to_photo')";
// echo $add_car;
$mysqli->query($add_car);
