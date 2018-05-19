
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RideNow</title>
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
        <li><a href="homepage.php" class="page-scroll" style="font-size: 15px ;">Home</a></li>
        <li><a href="#services" class="page-scroll active" style="font-size: 15px ;">About</a></li>
        <li><a href="#portfolio" class="page-scroll active" style="font-size: 15px ;">Register</a></li>
        <li><a href="#contact" class="page-scroll" style="font-size: 15px ;">Contact</a></li>
        <li><a href="#contact" class="page-scroll" style="font-size: 15px ;">Login</a></li>
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
        <p>RideNow provide you with comfortable car enviroment at the lowest price depends on traffic and offers. Please stay with us to experience more.</p>
      </div>
      <div class="col-md-8 col-md-offset-2">
        <form name="sentMessage" id="contactForm" action="waitDriver.php" method="post">

              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Rider's Name :</label>
                <input type="text" value="<?php echo $platformName; ?>" class="form-control" readonly="">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Rider's Phone :</label>
                <input type="text" value="<?php echo $current; ?>" class="form-control" readonly="" >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Rider's Current Location :</label>
                <input type="text" value="<?php echo $destination; ?>" class="form-control" readonly="" >
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Rider's Destination :</label>
                <input type="text" value="<?php echo "RM".$price; ?>" class="form-control" readonly="" >
                <p class="help-block text-danger"></p>
              </div>

          <input type="submit" name="confirm" class="btn btn-default" value="Drop Rider's">
          <a href="#map" class="btn btn-default page-scroll" value="Go To Maps">Go To Maps</a>
        </form>
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
 function dropRider() {
  
  
  var d = confirm("Is your rider reaching his destination?");
  if (d == true) {
  
   window.location.replace("dropRider.php");
}
   else {
       window.location.replace("gotoRider.php");
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