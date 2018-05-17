<?php
include 'db_connection.php';

$conn = OpenCon();

//echo "Connected Successfully";


session_start();
if(isset($_SESSION['loginUser'])) {
//  echo "Your session is running " . $_SESSION['loginUser'];
  }

if( isset($_POST["confirm"]) ){
		
		$phone = $_SESSION['loginUser'];
		$platformName = $_SESSION["platformName"];
		$current = $_SESSION["current"];
		$destination = $_SESSION["destination"];
		$price = $_SESSION["price"];
  

$sql = "INSERT INTO booking (phone, platformName, current, destination, price) VALUES ('$phone', '$platformName', '$current', '$destination', '$price')";
		
if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully ";
	
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

	
}

}


$conn->close();
?>


<html>
<head>
	<meta http-equiv="refresh" content="0; URL='http://localhost/RideNow_2.0/pickupStatus.php'"/> 
	</head>

<body>
	<h1>We are finding a driver for you...</h1>
	


	</body>
</html>

