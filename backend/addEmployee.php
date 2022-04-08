<?php
require "./db_connect.php";
$login = $_POST["login"];
$password = $_POST["password"];
$fullName = $_POST["fullName"];
$add = "INSERT INTO users (fullName,login,password,user_type) VALUES ('$fullName','$login','$password',2)";
$mysqli->query($add);
header("Location:../adminPanel.php");
