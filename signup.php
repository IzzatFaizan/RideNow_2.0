<?php
include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";


if( isset($_POST["register"]) ){
		
		$username = $_POST["username"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$emergencyPhone = $_POST["emerPhone"];
		$emergencyName = $_POST["emerName"];
  

$sql = "INSERT INTO user (username, phone, email, password, emergencyPhone, emergencyName) VALUES ('$username', '$phone', '$email', '$password', '$emergencyPhone', '$emergencyName')";
		
if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully ";
	session_start();
	$_SESSION['loginUser'] =$_POST["phone"] ;

	echo 'session create'.$_SESSION['loginUser'];
	header("Location: http://localhost/RideNow_2.0/bookCar.php");
	
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
		$carType = $_POST["carType"];
		$platNo = $_POST["password"];
		$colour = $_POST["colour"];
		$year = $_POST["year"];
  

$sql = "INSERT INTO driver (driverName, driverPhone, password, carType, platNo, colour, year) VALUES ('$drivername', '$driverphone', '$password', '$carType', '$platNo', '$colour', '$year')";
		
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