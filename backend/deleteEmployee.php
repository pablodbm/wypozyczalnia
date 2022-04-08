<?php
require "./db_connect.php";
$mysqli->query("DELETE FROM users WHERE id='" . $_POST["employee"] . "'");
header("Location:../adminUsers.php");
