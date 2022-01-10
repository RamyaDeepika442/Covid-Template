<?php
	include '../libraries/connection.php';
	$username=$_POST['username'];
  $phnumber=$_POST['phnumber'];
  $dateofbirth=$_POST['dateofbirth'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];

  $query = mysqli_query($conn, "INSERT INTO user_details VALUES(NULL, '$_POST[username]', '$_POST[phnumber]', '$_POST[dateofbirth]', '$_POST[email]', md5('$_POST[pwd]'))") or die(mysqli_error($conn));
  if($query)
  {
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
	?>
