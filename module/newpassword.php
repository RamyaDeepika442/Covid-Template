<?php
include '../libraries/connection.php';

if (isset($_POST['submit'])) {
  	$email = $_POST['email'];
  	$npwd = md5($_POST['npwd']);
    if ($email != "" && $npwd != "") {
    	$sql = "UPDATE user_details SET pwd = md5('$_POST[npwd]') WHERE email = '$_POST[email]'";
    	$result = mysqli_query($conn, $sql);
      echo "<script>alert('Password Updated Successfully!')</script>";
    	header("Location: ../controller/loginform.php");
   } else {
      $msg = "Please fill all the fields!";
    	$css_class = "alert-danger";
   }
 }
?>
