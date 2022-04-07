<?php

session_start();
require("./db_connect.php");
$login = mysqli_real_escape_string($mysqli, $_POST["login"]);
$password = mysqli_real_escape_string($mysqli, $_POST["password"]);


$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
$result = $mysqli->query($query);
if (mysqli_num_rows($result) == 0) {
    header("Location:../loginForm.php?bad_log=true");
} else {

    $result = $result->fetch_assoc();
    $_SESSION["fullName"] = $result["fullName"];
    $_SESSION["id"] = $result["id"];


    header("Location:../index.php");
}
