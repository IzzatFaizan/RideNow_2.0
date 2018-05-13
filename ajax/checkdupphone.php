<?php
include '../ajax/db_connection.php';
$conn = OpenCon();

if(isset($_POST["phone"])){
    $phone= "+60".$_POST["phone"];
    $sqlgetphone = "select phone from user where phone='$phone';";
    $run_getphone = mysqli_query($conn,$sqlgetphone);
    if(mysqli_num_rows($run_getphone)==0){
        echo"false";
    }
    else if(mysqli_num_rows($run_getphone)==1){
        echo"true";
    }
    
}

?>