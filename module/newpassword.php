<?php
include '../libraries/connection.php';

if (isset($_POST['submit'])) {
  	$email = $_POST['email'];
  	$npwd = md5($_POST['npwd']);
    if ($email != "" && $npwd != "") {
    	$sql = "UPDATE user_details SET pwd = md5('$_POST[npwd]') WHERE email = '$_POST[email]'";
    	$result = mysqli_query($conn, $sql);
      echo "<script>alert('Password updated successfully!')</script>";
    	header("Location: ../controller/login.php");
   } else {
      echo "<script>alert('Please fill all the fields!')</script>";
   }
 }
?>
