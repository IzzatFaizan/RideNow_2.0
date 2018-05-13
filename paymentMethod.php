<?php
include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
  }
  $phone = $_SESSION['loginUser'];

if( isset($_POST["payment"]) ){
		
		$paymentMethod = $_POST["paymentmethod"];
		
		
  if($paymentMethod == 'card'){

  	$sql = "UPDATE user SET paymentMethod ='$paymentMethod' WHERE phone='$phone';";
  }

  else if ($paymentMethod == 'cash'){
  	$sql = "UPDATE user SET paymentMethod ='$paymentMethod' WHERE phone='$phone'";
  }

		
if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully ";
	
	echo 'session create'.$_SESSION['loginUser'];
	header("Location: http://localhost/RideNow_2.0/bookCar.php");
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	
	// echo '<script>history.back();</script>';
	
}

}

$conn->close();
?>