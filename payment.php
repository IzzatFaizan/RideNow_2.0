<?php

include 'db_connection.php';

$conn = OpenCon();

//echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
 // echo "Your session is running " . $_SESSION['loginUser'];
  }

$phone = $_SESSION['loginUser'];
$get_paymentMethod = "select paymentMethod from user where phone = '$phone'";

    $run_getMethod = mysqli_query($conn,$get_paymentMethod);
    
  $result = mysqli_fetch_array($run_getMethod);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> RideNow | Payment</title>
<meta name="description" content="">
<meta name="author" content="">


<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/modernizr.custom.js"></script>

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


<style>
       
        .reveal-if-active{
            display:none;
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
      <a class="navbar-brand page-scroll" href="index.php"><i class="fa fa-car"></i> RideNow</a> 
    </div>
    
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
        <h2>Choose Payment Method</h2>
        <p>RideNow provide you with comfortable car environment at the lowest price depends on traffic and offers. Please stay with us to experience more.</p>
      </div>
      <div class="col-md-8 col-md-offset-2">
        <form name="sentMessage" id="contactForm" action="paymentMethod.php" method="post">
          <div class="row">
              <div class="form-group">
                
                <input type="radio" style="float: left" name="paymentmethod" id="cash" value="cash" required="" <?php echo ($result['paymentMethod']=='cash')?'checked':'' ?>><span style="font-size: 16px;color:white;float:left;padding-left: 10px"> Cash</span>
              </div>
              <br>
              <div class="form-group">
                
                <input type="radio" style="float: left" name="paymentmethod" id="card" value="card" <?php echo ($result['paymentMethod']=='card')?'checked':'' ?>><span style="font-size: 16px;color:white;float:left;padding-left: 10px"> Credit/Debit Card</span>

              </div>
                      
                <p class="help-block text-danger"></p> 
                <div class="reveal-if-active">
            <br>
           <input type="text" class="form-control" name="cardnum" id="cardnum" placeholder="Card Number" required>      
           <input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV" required>
           <label for="cash">Expiry Date</label>
            <input type="month" class="form-control" name="exp" id="exp" required>
          </div>
              </div>

             
              <input type="submit" name="payment" class="btn btn-default" value="Save Payment Detail">
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

<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script>
 $(document).ready(function () {
            $('input[type=radio][name=paymentmethod]').change(function () {
                if (this.value == 'cash') {        
                    $('.reveal-if-active').hide();
                }
                else if (this.value == 'card') {
                    $('.reveal-if-active').show();
                }
            });
        });
</script>
</body>
</html>