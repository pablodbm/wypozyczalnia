<?php
session_start();
$rent_id = $_GET["id"];
$user_id = $_SESSION["id"];
$car_id = $_GET["car_id"];
require "./db_connect.php";
$delete_rental = "DELETE FROM rentals WHERE id=$rent_id";
echo $delete_rental;
$mysqli->query($delete_rental);

$upgrade_cars = "UPDATE cars SET reserved=0 WHERE id='$car_id'";
$mysqli->query($upgrade_cars);
header("Location:../myAccount.php");
