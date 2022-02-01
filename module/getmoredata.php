<?php
include("../libraries/connection.php");

$lastId = $_GET['lastId'];
$sortValue = $_GET['sortValue'];
$condition = "";

if($sortValue == 'ASC') {
   $condition = "WHERE id > $lastId ORDER BY id $sortValue";
} else if($sortValue == 'DESC') {
   $condition = "WHERE id < $lastId ORDER BY id $sortValue";
} else {
  $condition = "WHERE id > $lastId ORDER BY id $sortValue";
}

$sqlQuery = "SELECT id,observationdate,state,country,lastupdate,confirmed,deaths,recovered FROM covid_data $condition LIMIT 5";
$result = mysqli_query($conn, $sqlQuery);

     // output data of each row
      while ($row = mysqli_fetch_assoc($result))
      {
        ?>
       <tr class = "table-data" id="<?php echo $row['id']; ?>">
       <td> <?php echo $row['observationdate']; ?> </td>
       <td> <?php echo $row['state']; ?> </td>
       <td> <?php echo $row['country']; ?> </td>
       <td> <?php echo $row['lastupdate']; ?> </td>
       <td> <?php echo $row['confirmed']; ?> </td>
       <td> <?php echo $row['deaths']; ?> </td>
       <td> <?php echo $row['recovered']; ?> </td>
       </tr>
       <?php
     }
?>
