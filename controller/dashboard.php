<?php
include("../libraries/connection.php");

// Infinite Scroll
$sqlQuery = "SELECT id,observationdate,state,country,lastupdate,confirmed,deaths,recovered FROM covid_data";
$result = mysqli_query($conn, $sqlQuery);
$total_count = mysqli_num_rows($result);

$sqlQuery = "SELECT id,observationdate,state,country,lastupdate,confirmed,deaths,recovered FROM covid_data LIMIT 5";
$result = mysqli_query($conn, $sqlQuery);
$covid_data_array = array();
$count = 0;
while($coviddata_row = mysqli_fetch_array($result)) {
  $covide_data_array[$count]['id'] = $coviddata_row['id'];
  $covide_data_array[$count]['observationdate'] = $coviddata_row['observationdate'];
  $covide_data_array[$count]['state'] = $coviddata_row['state'];
  $covide_data_array[$count]['country'] = $coviddata_row['country'];
  $covide_data_array[$count]['lastupdate'] = $coviddata_row['lastupdate'];
  $covide_data_array[$count]['confirmed'] = $coviddata_row['confirmed'];
  $covide_data_array[$count]['deaths'] = $coviddata_row['deaths'];
  $covide_data_array[$count]['recovered'] = $coviddata_row['recovered'];
  $count++;
}

// Infinite Scroll 2
$sqlQuery = "SELECT id,state,country,lat,longitude,jan01,jan02,jan03,jan04,jan05,jan06 FROM covid_confirmed_data_2021";
$result = mysqli_query($conn, $sqlQuery);
$total_data_count = mysqli_num_rows($result);

$sqlQuery = "SELECT id,state,country,lat,longitude,jan01,jan02,jan03,jan04,jan05,jan06 FROM covid_confirmed_data_2021 LIMIT 5";
$result = mysqli_query($conn, $sqlQuery);
$covid_data_confirmed_2021_array = array();
$count = 0;
while($coviddata_confirmed_row = mysqli_fetch_array($result)) {
  $covid_data_confirmed_2021_array[$count]['id'] = $coviddata_confirmed_row['id'];
  $covid_data_confirmed_2021_array[$count]['state'] = $coviddata_confirmed_row['state'];
  $covid_data_confirmed_2021_array[$count]['country'] = $coviddata_confirmed_row['country'];
  $covid_data_confirmed_2021_array[$count]['lat'] = $coviddata_confirmed_row['lat'];
  $covid_data_confirmed_2021_array[$count]['longitude'] = $coviddata_confirmed_row['longitude'];
  $covid_data_confirmed_2021_array[$count]['jan01'] = $coviddata_confirmed_row['jan01'];
  $covid_data_confirmed_2021_array[$count]['jan02'] = $coviddata_confirmed_row['jan02'];
  $covid_data_confirmed_2021_array[$count]['jan03'] = $coviddata_confirmed_row['jan03'];
  $covid_data_confirmed_2021_array[$count]['jan04'] = $coviddata_confirmed_row['jan04'];
  $covid_data_confirmed_2021_array[$count]['jan05'] = $coviddata_confirmed_row['jan05'];
  $covid_data_confirmed_2021_array[$count]['jan06'] = $coviddata_confirmed_row['jan06'];
  $count++;
}

include("../view/mainheader.php");
include("../view/dashboard.php");
include("../view/mainfooter.php");
?>
