<?php
include '../libraries/connection.php';
if($_POST['action'] == 'importdata') {
  if(!empty($_FILES['file']['name']))
  {
   $allowed_ext = array("csv");
    $filename = $_FILES["file"]["name"];
   if($filename == "covid_data.csv") {
      $file_data = fopen($_FILES["file"]["tmp_name"], "r");
      fgetcsv($file_data);
        $query = "INSERT INTO covid_data(observationdate,state,country,lastupdate,confirmed,deaths,recovered) VALUES";
        $val ='';
      while($row = fgetcsv($file_data))
      {
       //  $SNo = mysqli_real_escape_string($conn, $row[0]);
        $observationdate = mysqli_real_escape_string($conn, $row[1]);
        $state = mysqli_real_escape_string($conn, $row[2]);
        $country = mysqli_real_escape_string($conn, $row[3]);
        $lastupdate = mysqli_real_escape_string($conn, $row[4]);
        $confirmed = mysqli_real_escape_string($conn, $row[5]);
        $deaths = mysqli_real_escape_string($conn, $row[6]);
        $recovred = mysqli_real_escape_string($conn, $row[7]);
        $val .=  "('$observationdate','$state','$country','$lastupdate','$confirmed','$deaths','$recovred'),";
      }
        $val = rtrim($val,",");
        $final_query = $query.' '.$val;
        $res =  mysqli_query($conn, $final_query);
    }
     else if($filename == "covid_confirmed_data.csv") {
       $file_data = fopen($_FILES["file"]["tmp_name"], "r");
       fgetcsv($file_data);
       $query = "INSERT INTO covid_confirmed_data(state,country,lat,longitude,jan1,jan2,jan3,jan4,jan5,jan6) VALUES";
       $val ='';
       while($row = fgetcsv($file_data))
       {
        // $id = mysqli_real_escape_string($conn, $row[0]);
         $state = mysqli_real_escape_string($conn, $row[1]);
         $country = mysqli_real_escape_string($conn, $row[2]);
         $lat = mysqli_real_escape_string($conn, $row[3]);
         $long = mysqli_real_escape_string($conn, $row[4]);
         $dateone = mysqli_real_escape_string($conn, $row[5]);
         $datetwo = mysqli_real_escape_string($conn, $row[6]);
         $datethree = mysqli_real_escape_string($conn, $row[7]);
         $datefour = mysqli_real_escape_string($conn, $row[8]);
         $datefive = mysqli_real_escape_string($conn, $row[9]);
         $datesix = mysqli_real_escape_string($conn, $row[10]);
         $val .=  "('$state','$country','$lat','$long','$dateone','$datetwo','$datethree','$datefour','$datefive','$datesix'),";
       }
         $val = rtrim($val,",");
         $final_query = $query.' '.$val;
         $res =  mysqli_query($conn, $final_query);
         print_r( $final_query);
      }
    else
     {
      echo "Error3";
    }
  }
  else {
    echo "Error1";
  }
}
else {
  echo "Error2";
}

?>
