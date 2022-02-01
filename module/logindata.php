<?php
include '../libraries/connection.php';

session_start();
error_reporting(0);

if (isset($_POST['submit'])) {

	if(!empty($_POST["remember"])) {
		setcookie ("email",$_POST['email'],time() + (86400 * 30));
		setcookie ("password",$_POST['pwd'],time() + (86400 * 30));
		echo "Cookies Set Successfuly";
	} else {
		setcookie("email","");
		setcookie("password","");
		echo "Cookies Not Set";
	}

	$email = $_POST['email'];
	$pwd = md5($_POST['pwd']);

	$sql = "SELECT * FROM user_details WHERE email='$email' AND pwd='$pwd'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['profileimage'] = $row['profileimage'];
		header("Location: ../controller/dashboard.php");
	} else {
  	$msg = "Woops! Email or Password is Wrong.";
  	$css_class = "alert-danger";
	}
}

?>
