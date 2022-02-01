<?php
include("../libraries/connection.php");
session_start();
$msg = "";
$css_class = "";

if(isset($_POST['image']))
{
	$data = $_POST['image'];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

  $image_name = '../images/' . time() . '.png';

	$profile_image = time() . '.png';

	$_SESSION['$profile_image'] = $profile_image;

	file_put_contents($image_name, $data);

	echo $image_name;
}

if(isset($_POST['save'])) {
    $profileimagename = $_SESSION['$profile_image'];
	  $fullname = $_POST['fullname'];
	  $email = $_POST['email'];
	  $role = $_POST['role'];
	  $dateofbirth = $_POST['dateofbirth'];
	  $interests = $_POST['interests'];

    $user =  $_SESSION['id'];
		$user_id = $_SESSION['user_id'];
//		echo $user_id;
  if($user_id) {
		$sql = "UPDATE user_profile_data
		SET profileimage='$profileimagename',user_id='$user',fullname='$_POST[fullname]',email='$_POST[email]',role='$_POST[role]',dateofbirth='$_POST[dateofbirth]',interests='$_POST[interests]' WHERE user_id='$user'";
//    echo $sql;
		if (mysqli_query($conn, $sql)) {
			$msg = "Successfully Updated User Profile!";
			$css_class = "alert-success";
		}
	} else {
	    $sql = "INSERT INTO user_profile_data (profileimage, user_id, fullname, email, role, dateofbirth, interests)
	    VALUES ('$profileimagename', '$user', '$fullname', '$email', '$role', '$dateofbirth', '$interests')";
	//		echo $sql;
	    if (mysqli_query($conn, $sql)) {
	      $msg = "Successfully created User Profile!";
	      $css_class = "alert-success";
	    } else {
	      $msg = "Database Error: Failed to save";
	      $css_class = "alert-danger";
	    }
		}
  }



/*if($image_name) {
	 $profileimagename = $profile_image;
} else {
	$profileimagename = $_SESSION['profileimage'];
} */
/*
include("../libraries/connection.php");
$msg = "";
$css_class = "";

if(isset($_POST['save'])) {
  $profileimagename = time() . '_' . $_FILES['profileimage']['name'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $role = $_POST['role'];
  $dateofbirth = $_POST['dateofbirth'];
  $interests = $_POST['interests'];

  $target = '../images/' . $profileimagename;

  if(move_uploaded_file($_FILES['profileimage']['tmp_name'], $target)) {
    $sql = "INSERT INTO user_profile_data (profileimage, fullname, email, role, dateofbirth, interests)
    VALUES ('$profileimagename', '$fullname', '$email', '$role', '$dateofbirth', '$interests')";
    if (mysqli_query($conn, $sql)) {
      $msg = "Successfully created User Profile!";
      $css_class = "alert-success";
    } else {
      $msg = "Database Error: Failed to save";
      $css_class = "alert-danger";
    }
  } else {
    $msg = "Please fill all the fields!";
    $css_class = "alert-danger";
  }
}*/

?>
