<?php
include("../libraries/connection.php");

$lastDataId = $_GET['lastDataId'];
$sqlQuery = "SELECT id,state,country,lat,longitude,jan01,jan02,jan03,jan04,jan05,jan06 FROM covid_confirmed_data_2021 WHERE id > '" . $lastDataId . "' LIMIT 5";
$result = mysqli_query($conn, $sqlQuery);

     // output data of each row
      while ($row = mysqli_fetch_assoc($result))
      {
        ?>
       <tr class = "add-table-data" id="<?php echo $row['id']; ?>">
         <td> <?php echo $row['state']; ?> </td>
         <td> <?php echo $row['country']; ?> </td>
         <td> <?php echo $row['lat']; ?> </td>
         <td> <?php echo $row['longitude']; ?> </td>
         <td> <?php echo $row['jan01']; ?> </td>
         <td> <?php echo $row['jan02']; ?> </td>
         <td> <?php echo $row['jan03']; ?> </td>
         <td> <?php echo $row['jan04']; ?> </td>
         <td> <?php echo $row['jan05']; ?> </td>
         <td> <?php echo $row['jan06']; ?> </td>
       </tr>
       <?php
     }
?>
