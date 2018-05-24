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
$commentID = $_GET['commentID'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "UPDATE comment SET complaintStatus='Resolved' WHERE commentID=$commentID");
header("Location: http://localhost/RideNow_2.0/listComplaint.php");
 
$conn->close();

?>