<?php
include("../libraries/connection.php");

$table =
 "CREATE TABLE covid_confirmed_data_2021 (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  state varchar(100) NOT NULL,
  country varchar(100) NOT NULL,
  lat float(50) NOT NULL,
  longitude float(50) NOT NULL,
  jan01 int(50) NOT NULL,
  jan02 int(50) NOT NULL,
  jan03 int(50) NOT NULL,
  jan04 int(50) NOT NULL,
  jan05 int(50) NOT NULL,
  jan06 int(50) NOT NULL,
  jan07 int(50) NOT NULL,
  jan08 int(50) NOT NULL,
  jan09 int(50) NOT NULL,
  jan10 int(50) NOT NULL,
  PRIMARY KEY (id)
)";

if(mysqli_query($conn, $table)) {
  echo "Table covid_confirmed_data_2021 created Successfully!";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


if($_POST['action'] == 'importdata2') {
  if(!empty($_FILES['filename']['name']))
  {
    $allowed_ext = array("csv");
    $filename = $_FILES["filename"]["name"];
    $file_data = fopen($_FILES["filename"]["tmp_name"], "r");
    fgetcsv($file_data);
    $query = "INSERT INTO covid_confirmed_data_2021(state,country,lat,longitude,jan01,jan02,jan03,jan04,jan05,jan06,jan07,jan08,jan09,jan10) VALUES";
    $val ='';
    while($row = fgetcsv($file_data))
    {
      $state = mysqli_real_escape_string($conn, $row[1]);
      $country = mysqli_real_escape_string($conn, $row[2]);
      $lat = mysqli_real_escape_string($conn, $row[3]);
      $longitude = mysqli_real_escape_string($conn, $row[4]);
      $dateone = mysqli_real_escape_string($conn, $row[5]);
      $datetwo = mysqli_real_escape_string($conn, $row[6]);
      $datethree = mysqli_real_escape_string($conn, $row[7]);
      $datefour = mysqli_real_escape_string($conn, $row[8]);
      $datefive = mysqli_real_escape_string($conn, $row[9]);
      $datesix = mysqli_real_escape_string($conn, $row[10]);
      $dateseven = mysqli_real_escape_string($conn, $row[11]);
      $dateeight = mysqli_real_escape_string($conn, $row[12]);
      $datenine = mysqli_real_escape_string($conn, $row[13]);
      $dateten = mysqli_real_escape_string($conn, $row[14]);
      $val .=  "('$state','$country','$lat','$longitude','$dateone','$datetwo','$datethree','$datefour','$datefive','$datesix','$dateseven','$dateeight','$datenine','$dateten'),";
    }
      $val = rtrim($val,",");
      $final_query = $query.' '.$val;
      $res =  mysqli_query($conn, $final_query);
      print_r( $final_query);
   }
    else {
      echo "error1";
    }
  }
  else {
    echo "error2";
  }

mysqli_close($conn);
?>
