<?php
include '../ajax/db_connection.php';
$conn = OpenCon();

if(isset($_POST["driverphone"])){
    $driverphone= $_POST["driverphone"];
    $sqlgetphone = "select driverPhone from driver where driverPhone='$driverphone';";
    $run_getphone = mysqli_query($conn,$sqlgetphone);
    if(mysqli_num_rows($run_getphone)==0){
        echo"false";
    }
    else if(mysqli_num_rows($run_getphone)==1){
        echo"true";
    }
    
}

?>