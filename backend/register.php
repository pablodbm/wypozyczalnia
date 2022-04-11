<?php

session_start();
require("./db_connect.php");
$login = mysqli_real_escape_string($mysqli, $_POST["login"]);
$password = mysqli_real_escape_string($mysqli, $_POST["password"]);
$fullName = mysqli_real_escape_string($mysqli, $_POST["fullName"]);
$birthDate = mysqli_real_escape_string($mysqli, $_POST["birthDate"]);
$pesel = mysqli_real_escape_string($mysqli, $_POST["pesel"]);
$street = mysqli_real_escape_string($mysqli, $_POST["street"]);
$buildingNumber = mysqli_real_escape_string($mysqli, $_POST["buildingNumber"]);
$city = mysqli_real_escape_string($mysqli, $_POST["city"]);

$query = "SELECT * FROM users WHERE login='$login'";
$result = $mysqli->query($query);

$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    $_SESSION["login_w_bazie"] = 0;
} else {
    $query = "INSERT INTO users (fullName,login,password,birthDate,pesel,street,buildingNumber,city) VALUES ('$fullName','$login','$password','$birthDate','$pesel','$street','$buildingNumber','$city')";
    $mysqli->query($query);


    header("Location:../loginForm.php?register=true");
}
