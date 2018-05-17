<?php
include 'db_connection.php';
$conn = OpenCon();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $mconn->connect_error);
}


session_start();
if(isset($_SESSION['loginUser'])) {
//  echo "Your session is running " . $_SESSION['loginUser'];
  }


//getting id from url
$platformID = $_GET['platformID'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM platform WHERE platformID=$platformID");
 
while($res = mysqli_fetch_array($result))
{
    $platformName = $res['platformName'];
    $current = $res['current'];
    $destination = $res['destination'];
    $price = $res['price'];
}

$_SESSION['platformName']= $platformName;
$_SESSION['current']= $current;
$_SESSION['destination']= $destination;
$_SESSION['price']= $price;

$conn->close();

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
        <h2>Confirm Your Booking</h2>
        <p>RideNow provide you with comfortable car enviroment at the lowest price depends on traffic and offers. Please stay with us to experience more.</p>
      </div>
      <div class="col-md-8 col-md-offset-2">
        <form name="sentMessage" id="contactForm" action="waitDriver.php" method="post">
          <div class="row">
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Platform Name :</label>
                <input type="text" value="<?php echo $platformName; ?>" class="form-control" readonly="">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Current Location :</label>
                <input type="text" value="<?php echo $current; ?>" class="form-control" readonly="" >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Destination :</label>
                <input type="text" value="<?php echo $destination; ?>" class="form-control" readonly="" >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Price :</label>
                <input type="text" value="<?php echo "RM".$price; ?>" class="form-control" readonly="" >
                <p class="help-block text-danger"></p>
              </div>
          </div>
          <div id="success"></div>
          <input type="submit" name="confirm" class="btn btn-default" value="Confirm">
        </form>
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