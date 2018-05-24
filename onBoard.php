<?php
include 'db_connection.php';

$conn = OpenCon();

//echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
//  echo "Your session is running " . $_SESSION['loginUser'];
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/tab.png" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="5; URL='http://localhost/RideNow_2.0/dropoffStatus.php'"/>
<title>RideNow | On Board</title>
<meta name="description" content="">
<meta name="author" content="">


<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 70%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 106px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 20px;
      }
    </style>

<style>
.dropbtn {
    background-color: transparent;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #cbced3}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: transparent;
}
</style>

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="index.php"><i class="fa fa-car"></i> RIDENOW</a> </div>
    
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" class="page-scroll" style="font-size: 15px ;">Home</a></li>
        <li>
          <?php
          if(isset($_SESSION['loginUser'])) {

            echo "
            
            <div class=\"dropdown \" style=\"float:right;\">
              <button class=\"dropbtn page-scroll fa fa-car\" style=\"font-size: 15px ;\"> MY ACCOUNT</button>
              <div class=\"dropdown-content\">
              <a href=\"bookCar.php\">Book Now</a>
              <a href=\"userProfile.php\">My Profile</a>
              <a href=\"payment.php\">Payment</a>
              <a href=\"logout.php\">Logout</a>
              </div>
            </div>
          "; 
          }else 
          echo "
        
            <a class=\"page-scroll fa fa-car\" style=\"font-size: 15px ;\" href=\"login.php\">Login</a>
           
          ";
          
          ?>
          </li>
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
        <h2>Riders On Board</h2>
        <p>RideNow provide you with comfortable car environment at the lowest price depends on traffic and offers. Please stay with us to experience more.</p>
      </div>
      <div class="col-md-8 col-md-offset-2">
      
  <?php

  $phone = $_SESSION['loginUser'];
        $get_info= "select booking.driverPhone, driver.driverName, car.carType, car.platNo, car.colour from booking inner join driver on booking.driverPhone = driver.driverPhone inner join car on driver.carID = car.carID where phone='$phone' order by bookingID desc limit 1";

        $run_getdriver = mysqli_query($conn,$get_info);
        
    $res = mysqli_fetch_array($run_getdriver);
    
    
        $info_driverName = $res['driverName'];
        $info_driverPhone = $res['driverPhone'];
        $info_carType = $res['carType'];
        $info_platNo = $res['platNo'];
        $info_colour = $res['colour'];

        $_SESSION['driverName'] = $info_driverName;
        $_SESSION['driverPhone'] = $info_driverPhone;
?>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Driver's Name :</label>
                <input type="text" value="<?php echo $info_driverName; ?>" class="form-control" readonly="">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Driver's Phone :</label>
                <input type="text" value="<?php echo $info_driverPhone; ?>" class="form-control" readonly="" >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Car Type :</label>
                <input type="text" value="<?php echo $info_carType; ?>" class="form-control" readonly="" >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Car Plat Number :</label>
                <input type="text" value="<?php echo $info_platNo; ?>" class="form-control" readonly="" >                <p class="help-block text-danger"></p>
              </div>
                <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Car Colour :</label>
                <input type="text" value="<?php echo $info_colour; ?>" class="form-control" readonly="" >                <p class="help-block text-danger"></p>
              </div>

          <input type="submit" name="sos" onclick="myFunction()" class="btn btn-default" value="SOS">
          <a href="#map" class="btn btn-default page-scroll" value="Go To Maps">Go To Maps</a>
     
      </div>
    </div>
  </div>
</div>



    <div id="map"></div>



<div id="footer">
  <div class="container text-center">
    <div class="fnav">
      <p>Copyright &copy; 2018 RideNow. Designed by<a href="" rel="nofollow"> EcomTeam</a></p>
    </div>
  </div>
</div>

<script>
 function myFunction() {
  
  
  var r = confirm("Make an emergency call?");
  if (r == true) {
  alert("Your have called your emergency contact person");
   window.location.replace("emergencySms.php");
}
   else {
       window.location.replace("onBoard.php");
    }
    
}

</script>

<script>

      function initMap() {
        var myLatLng = {lat: 2.9946937, lng: 101.7080672};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          zoom: 14,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });

             var marker1 = new google.maps.Marker({
          position: {lat: 3.0225781, lng: 101.715068},
          map: map,
          title: 'World!'
        });
      }
    </script>
 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd8CliF9no7A0FwNdp3OSbXoCeSWwVZzs&callback=initMap">
    </script>

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