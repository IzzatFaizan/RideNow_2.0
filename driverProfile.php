<?php
include 'db_connection.php';

$conn = OpenCon();

//echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
 // echo "Your session is running " . $_SESSION['loginUser'];
  }

$phone = $_SESSION['loginUser'];
  $get_info= "select * from driver WHERE driverPhone = $phone";
//  $get_info= "select driver.driverName, driver.driverPhone, car.carType, car.platNo, car.colour, car.year from driver inner join car on driver.carID = car.carID where driverPhone='$phone'";

    $run_getdriver = mysqli_query($conn,$get_info);
    
  $result = mysqli_fetch_array($run_getdriver);
$driverID = $result['driverID'];

?>

<?php
if (isset($_POST['update_profile'])) {
    $drivername = $_POST["drivername"];
    $driverphone = $_POST["driverphone"];
    $carType = $_POST["carType"];
    $platNo = $_POST["platNo"];
    $colour = $_POST["colour"];
    $year = $_POST["year"];


        $update_profile = "UPDATE driver SET driverName = '$drivername', driverPhone = '$driverphone', carType = '$carType', platNo = '$platNo', colour = '$colour', year = '$year' WHERE driverID = '$driverID'";
        $run_update = mysqli_query ($conn, $update_profile);

        if ($run_update) {
            echo "<script>alert('Your profile updated successfully')</script>";
            echo "<script>window.open('driverProfile.php?driverProfile','_self')</script>";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/tab.png" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RideNow | Driver's Profile</title>
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

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="index.php"><i class="fa fa-car"></i> RideNow</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
       
        <li>
          <?php
          if(isset($_SESSION['loginUser'])) {

            echo "
            
            <div class=\"dropdown \" style=\"float:right;\">
              <button class=\"dropbtn page-scroll fa fa-car\" style=\"font-size: 15px ;\"> MY ACCOUNT</button>
              <div class=\"dropdown-content\">
                <a href=\"driverProfile.php\">My Profile</a>
                <a href=\"acceptRider.php\">Rider Request</a>
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
        <h2>Driver's Profile</h2>
        <p>RideNow provide you with comfortable car environment at the lowest price depends on traffic and offers. Please stay with us to experience more.</p>
      </div>
      <form action = "driverProfile.php" method = "post">
      <div class="col-md-8 col-md-offset-2">
      
          <div class="row">
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Name :</label>
                <input type="text" name="drivername" value="<?php echo $result['driverName'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Mobile Number :</label>
                <input type="text" name="driverphone" value="<?php echo $result['driverPhone'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Car Model :</label>
                <input type="text" name="carType" value="<?php echo $result['carType'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Car Plat Number :</label>
                <input type="text" name="platNo" value="<?php echo $result['platNo'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Car Colour :</label>
                <input type="text" name="colour" value="<?php echo $result['colour'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Car Year of Manufactured :</label>
                <input type="text" name="year" value="<?php echo $result['year'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>

          </div>
          
          <div id="success"></div>
          <input type="submit" name="update_profile" class="btn btn-default" value="Update">
          <input type="button" name="back" class="btn btn-default" value="Back" onClick="document.location.href='acceptRider.php'">
    
      </div>
    </form>
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