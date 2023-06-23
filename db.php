<?php

$myserver = "localhost";
$username = "root";
$password = "";
$db = "api";


$conn = mysqli_connect($myserver, $username, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>