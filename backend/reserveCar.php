<?php

require "./db_connect.php";

$user_id = $_GET["user_id"];
$car_id = $_GET["car_id"];

$add_reservation = "INSERT INTO rentals (car_id,user_id) VALUES ('$car_id','$user_id')";

$update_car = "UPDATE cars SET reserved=1 WHERE id='$car_id'";
$mysqli->query($add_reservation);
$mysqli->query($update_car);
header("Location:../myAccount.php");
