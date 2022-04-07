<?php

session_start();
require("./db_connect.php");
$login = mysqli_real_escape_string($mysqli, $_POST["login"]);
$password = mysqli_real_escape_string($mysqli, $_POST["password"]);
$fullName = mysqli_real_escape_string($mysqli, $_POST["fullName"]);


$query = "SELECT * FROM users WHERE login='$login'";
$result = $mysqli->query($query);

$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    $_SESSION["login_w_bazie"] = 0;
    // header("Location:./register_site.php");
} else {
    $query = "INSERT INTO users (fullName,login,password) VALUES ('$fullName','$login','$password')";
    $mysqli->query($query);

    $query = "SELECT * FROM users WHERE login='$login' AND password='$haslo'";
    $result = $mysqli->query($query);
    $result = $result->fetch_assoc();
    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_type"] = $result["user_type"];
    $_SESSION["user_name"] = $result["user_name"];

    header("Location:../index.php");
}
