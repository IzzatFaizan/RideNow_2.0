<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","ridenow");
    $query=mysqli_query($con, "select * from platform where destination LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['destination'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>