<?php
include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";


if( isset($_POST["addCar"]) ){
		
		$carType = $_POST["carType"];
		$platNo = $_POST["platNo"];
		$colour = $_POST["colour"];
		$year = $_POST["year"];
	
  

$sql = "INSERT INTO car (carType, platNo, colour, year) VALUES ('$carType', '$platNo', '$colour', '$year')";
		
if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully ";
	session_start();
	$_SESSION['loginUser'] =$_POST["phone"] ;

	echo 'session create'.$_SESSION['loginUser'];
	header("Location: http://localhost/RideNow_2.0/listCar.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
//	echo"<script> alert('This phone number has been used')</script>";
	echo '<script>history.back();</script>';
	
}

}

else if( isset($_POST["driverRegister"]) ){
		
		$drivername = $_POST["drivername"];
		$driverphone = $_POST["driverphone"];
		$password = $_POST["password"];
  

$sql = "INSERT INTO driver (driverName, driverPhone, password) VALUES ('$drivername', '$driverphone', '$password')";
		
if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully ";
	session_start();
	$_SESSION['loginUser'] =$_POST["driverphone"] ;

	echo 'session create'.$_SESSION['loginUser'];
	header("Location: http://localhost/RideNow_2.0/acceptRider.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo"<script> alert('This phone number has been used')</script>";
	echo '<script>history.back();</script>';
	
}

}

$conn->close();
?>