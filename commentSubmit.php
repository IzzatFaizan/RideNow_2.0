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

if (isset($_POST['comment'])) {

	

$commentMsg = $_POST['commentMsg'];

	 $sql = "INSERT INTO comment (commentMsg, driverName, driverPhone) VALUES ('$commentMsg', '$driverName', '$driverPhone')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully ";
	
	header("Location: http://localhost/RideNow_2.0/bookCar.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo"<script> alert('Please rate our driver to improve our platform')</script>";
	// echo '<script>history.back();</script>';
	
}

}
 
  
 



?>