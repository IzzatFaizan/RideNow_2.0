<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/tab.png" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RideNow</title>
<meta name="description" content="">
<meta name="author" content="">
<link href="css/main.css" rel="stylesheet">
<link href="css/font-style.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet">
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>    
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lineandbars.js"></script>  
<script type="text/javascript" src="js/dash-charts.js"></script>
<script type="text/javascript" src="js/gauge.js"></script>
  <!-- NOTY JAVASCRIPT -->
<script type="text/javascript" src="js/noty/jquery.noty.js"></script>
<script type="text/javascript" src="js/noty/layouts/top.js"></script>
<script type="text/javascript" src="js/noty/layouts/topLeft.js"></script>
<script type="text/javascript" src="js/noty/layouts/topRight.js"></script>
<script type="text/javascript" src="js/noty/layouts/topCenter.js"></script>
  
<!-- You can add more layouts if you want -->
<script type="text/javascript" src="js/noty/themes/default.js"></script>
<!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>

<script type="text/javascript" src="js/admin.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

    });

    $(window).load(function () {

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script> 
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
        <li><a href="#page-top" class="page-scroll" style="font-size: 15px ;">Home</a></li>
        <li><a href="#services" class="page-scroll active" style="font-size: 15px ;">About</a></li>
        <li><a href="#portfolio" class="page-scroll active" style="font-size: 15px ;">Register</a></li>
        <li><a href="#contact" class="page-scroll active" style="font-size: 15px ;">Contact</a></li>
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
        
            <a class=\"page-scroll fa fa-car\" style=\"font-size: 15px ;\" href=\"login.php\"> Login</a>
           
          ";
          
          ?>
          </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<!-- Header -->


<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="overlay">
    <div class="container">              
          <div class="row">
              <div class="row">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-3 col-lg-3">
          <div class="dash-unit">
            <dtitle>User Profile</dtitle>
            <hr>

          <img src="img/face80x80.jpg" alt="Marcel Newman" class="img-circle">
        <br>
        <br>
        <h1>Marcel Newman</h1>
        <h3>Madrid, Spain</h3>
        <br>
          <div class="info-user">
            <span aria-hidden="true" class="li_user fs1"></span>
            <span aria-hidden="true" class="li_settings fs1"></span>
            <span aria-hidden="true" class="li_mail fs1"></span>
            <span aria-hidden="true" class="li_key fs1"></span>
          </div>
        </div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
          <div class="dash-unit">
          <dtitle>Platform Usage</dtitle>
          <hr>
            <div id="load"></div>
            <h2>45%</h2>
      </div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
          <div class="dash-unit">
          <dtitle>Weeky Revenue</dtitle>
          <hr>
            <div id="space"></div>
            <h2>65%</h2>
      </div>
        </div>
        
        <div class="col-sm-3 col-lg-3">

      <!-- LOCAL TIME BLOCK -->
          <div class="half-unit">
            <dtitle>Local Time</dtitle>
            <hr>
              <div class="clockcenter">
                <digiclock>12:45:25</digiclock>
              </div>
      </div>

      <!-- SERVER UPTIME -->
      <div class="half-unit">
            <dtitle>Server Uptime</dtitle>
            <hr>
            <div class="cont">
          <p><img src="img/up.png" alt=""> <bold>Up</bold> | 356ms.</p>
        </div>
      </div>

        </div>
      </div><!-- /row -->
          </div>
          
          <!-- SECOND ROW OF BLOCKS -->     
      <div class="row">

    <!-- GRAPH CHART - lineandbars.js file -->     
        <div class="col-sm-3 col-lg-3">
          <div class="dash-unit">
          <dtitle>Customer Rating Statistic</dtitle>
          <hr>
          <div class="section-graph">
            <div id="importantchart"></div>
            <br>
            <div class="graph-info">
              <i class="graph-arrow"></i>
              <span class="graph-info-big">98.75%</span>
              <span class="graph-info-small"><img src="img/up-small.png" alt="">  Satisfaction</span>
            </div>
          </div>
      </div>
        </div>

    <!-- LAST MONTH REVENUE -->     
        <div class="col-sm-3 col-lg-3">
          <div class="dash-unit">
            <dtitle>Last Month Revenue</dtitle>
            <hr>
            <div class="cont">
          <p><bold>$879</bold> | <ok>Approved</ok></p>
          <br>
          <p><bold>$377</bold> | <ok>Approved</ok></p>
          <br>
          <p><bold>$156</bold> | Pending</p>
          <br>
          <p><img src="img/up-small.png" alt=""> 12% Compared Last Month</p>

        </div>

      </div>
        </div>
        
    <div class="col-sm-3 col-lg-3">

    <!-- LIVE VISITORS BLOCK -->     
          <div class="half-unit">
            <dtitle>Live Visitors</dtitle>
            <hr>
            <div class="cont">
            <p><bold>388</bold></p>
            <p><img src="images/up-small.png" alt=""> 412 Max. | <img src="images/down-small.png" alt=""> 89 Min.</p>
            </div>
          </div>
          
    <!-- PAGE VIEWS BLOCK -->     
          <div class="half-unit">
            <dtitle>Page Views</dtitle>
            <hr>
            <div class="cont">
            <p><bold>145.0K</bold></p>
            <p><img src="images/up-small.png" alt=""> 23.88%</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3 col-lg-3">
    <!-- TOTAL SUBSCRIBERS BLOCK -->     
          <div class="half-unit">
            <dtitle>Total Subscribers</dtitle>
            <hr>
            <div class="cont">
            <p><bold>14.744</bold></p>
            <p>98 Subscribed Today</p>
            </div>
          </div>
          
    <!-- FOLLOWERS BLOCK -->     
          <div class="half-unit">
            <dtitle>Twitter Followers</dtitle>
            <hr>
            <div class="cont">
            <p><bold>17.833 Followers</bold></p>
            <p>SomeUser</p>
            </div>
          </div>
        </div>
      </div><!-- /row -->

      
      
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