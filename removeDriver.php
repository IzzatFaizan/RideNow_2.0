<?php
include 'db_connection.php';
$conn = OpenCon();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $mconn->connect_error);
}

session_start();
if(isset($_SESSION['loginUser'])) {
 // echo "Your session is running " . $_SESSION['loginUser'];
  }

//getting id from url
$driverID = $_GET['driverID'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "UPDATE driver SET driverStatus ='Complained' WHERE driverID=$driverID");
header("Location: http://localhost/RideNow_2.0/listDriver.php");
 
$conn->close();

?>