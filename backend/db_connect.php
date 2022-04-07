<?php

$user = "root";
$db_name = "wypozyczalnia";
$password ="";
$host = "localhost";
$mysqli = new mysqli($host,$user,$password,$db_name);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
