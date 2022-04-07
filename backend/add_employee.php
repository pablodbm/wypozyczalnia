<?php
require "./db_connect.php";
$login = $_POST["login"];
$password = $_POST["password"];
$fullName = $_POST["fullName"];
$add = "INSERT INTO users (fullName,login,password) VALUES ('$fullName','$login','$password')";
$mysqli->query($add);
