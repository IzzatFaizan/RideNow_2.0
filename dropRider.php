<?php

include 'db_connection.php';
$conn = OpenCon();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $mconn->connect_error);
}

session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
  }

//getting id from url
  $bookingID = $_SESSION['bookingID'];
$driverPhone = $_SESSION['loginUser'];
$info_userPhone = $_SESSION['userPhone'];
 
$sql = "UPDATE driver SET driverStatus ='Idle' WHERE driverPhone ='$driverPhone';UPDATE booking SET dropoffStatus = 'Dropped' WHERE bookingID=$bookingID";
		
if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully ";
   
	header("Location: http://localhost/RideNow_2.0/moneyCharged.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	header("Location: http://localhost/RideNow_2.0/goToRider.php");
	
	
}

$conn->close();
?>