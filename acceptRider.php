<?php

include 'db_connection.php';

$conn = OpenCon();

echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> RideNow | Book Car</title>
<meta name="description" content="">
<meta name="author" content="">


<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/modernizr.custom.js"></script>


</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="index.php"><i class="fa fa-car"></i> RideNow</a> 
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" class="page-scroll" style="font-size: 15px ;">Home</a></li>
        <li><a href="index.php" class="page-scroll" style="font-size: 15px ;">About</a></li>
        <li><a href="index.php" class="page-scroll" style="font-size: 15px ;">Register</a></li>
        <li><a href="index.php" class="page-scroll" style="font-size: 15px ;">Contact</a></li>
        <li><a href="#" class="page-scroll fa fa-car" style="font-size: 15px ;"> Login</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>


<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="overlay">
    <div class="container">
      <div class="col-md-8 col-md-offset-2 section-title">
        <h2>Accept Riders</h2>
        <p>RideNow provide you with comfortable car enviroment at the lowest price depends on traffic and offers. Please stay with us to experience more.</p>
      </div>
      <table class="table">
      <thead>
        <tr>
          <th><h1>RIDER'S CONTACT</h1></th>
          <th><h1>RIDER'S CURRENT LOCATION</h1></th>
          <th><h1>RIDER'S DESTINATION</h1></th>
          <th><h1>PRICE (RM)</h1></th>
          <th><h1>ACCEPT NOW</h1></th>
        </tr>
      </thead>
      <tbody>
     <?php


    
  

 $sqlgetloc = "select * from booking where pickupStatus is NULL;";
    $run_getloc= mysqli_query($conn,$sqlgetloc);


   while( $row = mysqli_fetch_array($run_getloc)) {
    
      echo "<tr height='50px'>";
      echo "<td>".$row['phone']."</td>";
      echo "<td>".$row['current']."</td>";
      echo "<td>".$row['destination']."</td>";
      echo "<td>".$row['price']."</td>";
      echo "<td width = '7%'><a class='linkEffect' href=\"acceptbooking.php?bookingID=$row[bookingID]\">Accept</a></td>";
      echo "</tr>";
}

$conn->close();
?>
       
     
      </tbody>
    </table>
      </div>
    </div>
  </div>
</div>



<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>Copyright &copy; 2018 RideNow. Designed by<a href="https://codepen.io/heypablete/pen/qdIsm" rel="nofollow"> EcomTeam</a></p>
    </div>
  </div>
</div>

</body>
</html>