<?php

include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
  }
$phone = $_SESSION['loginUser'];

 
  	$result = mysqli_query($conn, "SELECT * FROM booking WHERE phone='$phone' order by bookingID desc limit 1");
  	$res = mysqli_fetch_array($result);
  	$pickupStatus = $res['pickupStatus'];
	
	if(empty($pickupStatus)){
		header("Location: http://localhost/RideNow_2.0/waitDriver.php");
	}
	else if ($pickupStatus == 'Picked'){
		header("Location: http://localhost/RideNow_2.0/gotDriver.php");
	}
 

?>