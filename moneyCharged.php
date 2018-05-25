
<?php
include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
  }

$phone = $_SESSION['loginUser'];
$info_userPhone = $_SESSION['userPhone'];

$get_userinfo = "select * from user where phone = '$info_userPhone'";

    $run_getuser = mysqli_query($conn,$get_userinfo);
    
  $result = mysqli_fetch_array($run_getuser);

  $get_accinfo = "select * from booking where phone = '$info_userPhone' order by bookingID desc limit 1 ";

    $run_getacc = mysqli_query($conn,$get_accinfo);
    
  $accResult = mysqli_fetch_array($run_getacc);


  // Authorisation details.
  $username = "184184@student.upm.edu.my";
  $hash = "db00b12377e65d3fd932e05d21fc465ba287dfb753b4150c8c26fd8ce5c259d0";

  // Config variables. Consult http://api.txtlocal.com/docs for more info.
  $test = "0";

  // Data for text message. This is the text message data.
  $sender = "RideNow"; // This is who the message appears to be from.
  $numbers = $result['phone']; // A single number or a comma-seperated list of numbers
  $message = "RideNow. RM". $accResult['price']. " has been charged from your account. ";
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.txtlocal.com/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  curl_close($ch);
  header("Location: http://localhost/RideNow_2.0/statement.php");
?>