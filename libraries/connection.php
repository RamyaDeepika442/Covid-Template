<?php
$servername   = "localhost";
$username     = "root";
$password     = "";
$databasename = "corona";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$databasename);
// Check connection
if (!$conn) {
   die("Unable to Connect database: " . mysqli_connect_error());
 }

?>
