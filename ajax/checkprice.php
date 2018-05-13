<?php
include '../ajax/db_connection.php';
$conn = OpenCon();

if(isset($_POST["search"])){
    $current = $_POST["current"];
    $destination = $_POST["destination"];
    $sqlgetloc = "select platformName, current, destination from platform where current='$current' AND destination = '$destination';";
    $run_getloc= mysqli_query($conn,$sqlgetloc);
    if(mysqli_num_rows($run_getloc)==0){
        echo"false";
    }
    else if(mysqli_num_rows($run_getloc)==1){
        echo"true";
    }
    
}

?>