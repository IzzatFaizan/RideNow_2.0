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
    <th>Rider Phone Number</th>
    <th>Rider Current Location</th>
    <th>Rider Destination</th>
    <th>Price</th>
    
  </tr>

<?php


		
  

 $sqlgetloc = "select * from booking where pickupStatus is NULL;";
    $run_getloc= mysqli_query($conn,$sqlgetloc);


   while( $row = mysqli_fetch_array($run_getloc)) {
		
      echo "<tr height='50px'>";
      echo "<td>".$row['phone']."</td>";
      echo "<td>".$row['current']."</td>";
      echo "<td>".$row['destination']."</td>";
      echo "<td>RM".$row['price']."</td>";
      echo "<td width = '7%'><a class='linkEffect' href=\"acceptbooking.php?bookingID=$row[bookingID]\">Accept</a></td>";
      echo "</tr>";
}

$conn->close();
?>


</table>
</body>
</html>
