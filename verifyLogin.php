<?php 

	include 'db_connection.php';
	$conn = OpenCon();
	
	// Store Session Data
	
	if(isset($_POST['userLogin'])) {
		
		if(count($_POST) > 0) {
			$result = mysqli_query($conn,"SELECT phone, password FROM user WHERE phone='" . $_POST["phone"] . "' and password = '". $_POST["password"]."'");
			$count  = mysqli_num_rows($result);
			if($count == 0) {
				echo "<script>alert('Invalid login phone number or password');</script>";
				echo "<script>history.back();</script>";
			}
			
			else {
				session_start();
				$_SESSION['loginUser']= $_POST["phone"];
				
				header ("Location: http://localhost/RideNow_2.0/bookCar.php");
				
		
			}
		}
	}
	else if(isset($_POST['driversubmit'])) {
		
		if(count($_POST) > 0) {
			$result = mysqli_query($conn,"SELECT driverphone, password FROM driver WHERE driverphone='" . $_POST["driverphone"] . "' and password = '". $_POST["password"]."'");
			$count  = mysqli_num_rows($result);
			if($count == 0) {
				echo "<script>alert('Invalid login phone number or password');</script>";
				echo "<script>history.back();</script>";
			}
			
			else {
				session_start();
				$_SESSION['loginUser']= $_POST["driverphone"];
				
				header ("Location: http://localhost/ridenow/acceptRider.php");
				
		
			}
		}
	}
?>