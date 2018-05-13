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
<title> RideNow | Login</title>
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
        <li><a href="login.php" class="page-scroll fa fa-car" style="font-size: 15px ;"> Login</a></li>
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
        <p class="btn-default" style="font-size: 20px"><b>You Have Got A Driver</b></p>
      </div>
      <div class="col-md-8 col-md-offset-2">
        <form name="sentMessage" id="contactForm" novalidate>
       
          <div class="row">
              <div class="form-group">
                <label><a style="font-size: 15px">Driver's Name :</a></label>
                <input type="text" name="driverName" id="driverName" oninput="checkdupphone()" class="form-control" required="readonly">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label><a style="font-size: 15px">Driver's Phone Number :</a></label>
                <input type="text" name="driverContact" class="form-control" required readonly >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label><a style="font-size: 15px">Car Type :</a></label>
                <input type="text" name="carType" class="form-control" required readonly >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label><a style="font-size: 15px">Car Plat Number :</a></label>
                <input type="text" name="carPlat" class="form-control" required readonly >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label><a style="font-size: 15px">Car Color :</a></label>
                <input type="text" name="carColor" class="form-control" required readonly >
                <p class="help-block text-danger"></p>
              </div>
          </div>
          <div id="success"></div>
          <input type="submit" name="userLogin" class="btn btn-default" value="Ride Now">
        </form>
      </div>
    </div>
  </div>
</div>



<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>Copyright &copy; 2018 RideNow. Designed by<a href="http://www.templatewire.com" rel="nofollow"> EcomTeam</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>