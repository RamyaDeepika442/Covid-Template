<?php
include '../libraries/connection.php';

session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pwd = md5($_POST['pwd']);

	$sql = "SELECT * FROM user_details WHERE email='$email' AND pwd='$pwd'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: ../controller/dashboard.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>
