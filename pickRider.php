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
  if (isset($_POST["pickRider"])) {
$bookingID = $_SESSION['bookingID'];
$driverPhone = $_SESSION['loginUser'];
 
$sql = "UPDATE driver SET driverStatus ='Unavailable' WHERE driverPhone ='$driverPhone'";
		
if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully ";
	header("Location: http://localhost/RideNow_2.0/goToRider.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	header("Location: http://localhost/RideNow_2.0/acceptRider.php");
	
	
}
} else if (isset($_POST["cancel"])) {
	header("Location: http://localhost/RideNow_2.0/acceptRider.php");
}
$conn->close();
?>