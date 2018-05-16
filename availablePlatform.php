
<?php
  include "verifyLogin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> RideNow | Driver Login</title>
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
        <h2>Available Platform</h2>
        <p>RideNow provide you with comfortable car enviroment at the lowest price depends on traffic and offers. Please stay with us to experiance more.</p>
      </div>

      <table class="table">
  <thead>
    <tr>
      <th><h1>PLATFORM NAME</h1></th>
      <th><h1>CURRENT LOCATION</h1></th>
      <th><h1>DESTINATION</h1></th>
      <th><h1>PRICE (RM)</h1></th>
      <th><h1>BOOK NOW</h1></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>RideNow</td>
      <td>K6 UPM</td>
      <td>KTM Serdang</td>
      <td>01:32:50</td>
      <td><input type="submit" name="bookCar" class="bookBtn" value="Book Now"></td>
    </tr>
    <tr>
      <td>GrabCar</td>
      <td>K6 UPM</td>
      <td>KTM Serdang</td>
      <td>00:51:22</td>
      <td><input type="submit" name="bookCar" class="bookBtn" value="Book Now"></td>
    </tr>
    <tr>
      <td>Uber</td>
      <td>K6 UPM</td>
      <td>KTM Serdang</td>
      <td>00:24:34</td>
      <td><input type="submit" name="bookCar" class="bookBtn" value="Book Now"></td>
    </tr>
    <tr>
      <td>MyCar</td>
      <td>K6 UPM</td>
      <td>KTM Serdang</td>
      <td>00:12:10</td>
      <td><input type="submit" name="bookCar" class="bookBtn" value="Book Now"></td>
    </tr>
    <tr>
      <td>MyTeksi</td>
      <td>K6 UPM</td>
      <td>KTM Serdang</td>
      <td>00:46:19</td>
      <td><input type="submit" name="bookCar" class="bookBtn" value="Book Now"></td>
    </tr>
    <tr>
      <td>Student Cab</td>
      <td>K6 UPM</td>
      <td>KTM Serdang</td>
      <td>00:31:52</td>
      <td><input type="submit" name="bookCar" class="bookBtn" value="Book Now"></td>
    </tr>
    
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>



<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>Copyright &copy; 2018 RideNow. Designed by<a href="" rel="nofollow"> EcomTeam</a></p>
    </div>
  </div>
</div>

</body>
</html>