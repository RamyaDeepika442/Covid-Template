<?php
include("../libraries/connection.php");
session_start();
$user =  $_SESSION['id'];

$query = "SELECT profileimage, user_id, fullname, email, role, dateofbirth, interests FROM user_profile_data WHERE user_id = $user";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
//print_r($row);
if(!(empty($row))) {
  $_SESSION['profileimage'] = $row['profileimage'];
  $_SESSION['user_id'] = $row['user_id'];
}
?>
