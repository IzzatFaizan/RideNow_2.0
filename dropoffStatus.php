<?php

include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
  }
$phone = $_SESSION['loginUser'];
$driverName = $_SESSION['driverName'];
$driverPhone = $_SESSION['driverPhone'];
 
  	$result = mysqli_query($conn, "SELECT * FROM booking WHERE phone='$phone' order by bookingID desc limit 1");
  	$res = mysqli_fetch_array($result);
  	$dropoffStatus = $res['dropoffStatus'];
	
	if(empty($dropoffStatus)){
		header("Location: http://localhost/RideNow_2.0/onBoard.php");
	}
	else if ($dropoffStatus == 'Dropped'){
		header("Location: http://localhost/RideNow_2.0/commentDriver.php");
	}
 

?>