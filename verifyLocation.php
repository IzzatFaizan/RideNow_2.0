<?php

include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
  }

?>


<html>
<body>
	<table>
  <tr>
    <th>Platform Name</th>
    <th>Current Location</th>
    <th>Destination</th>
    <th>Price</th>
    
  </tr>

<?php


if( isset($_POST["search"]) ){
		
		$current = $_POST["current"];
		$destination = $_POST["destination"];
		
  

 $sqlgetloc = "select * from platform where current='$current' AND destination = '$destination';";
    $run_getloc= mysqli_query($conn,$sqlgetloc);


   while( $row = mysqli_fetch_array($run_getloc)) {
		
      echo "<tr height='50px'>";
      echo "<td>".$row['platformName']."</td>";
      echo "<td>".$row['current']."</td>";
      echo "<td>".$row['destination']."</td>";
      echo "<td>RM".$row['price']."</td>";
      echo "<td width = '7%'><a class='linkEffect' href=\"bookcar.php?platformID=$row[platformID]\">Book</a></td>";
      echo "</tr>";
}
}
$conn->close();
?>


</table>
</body>
</html>