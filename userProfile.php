<?php
include 'db_connection.php';

$conn = OpenCon();

//echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
 // echo "Your session is running " . $_SESSION['loginUser'];
  }

$phone = $_SESSION['loginUser'];
$get_userinfo= "select * from user where phone = '$phone'";

    $run_getuser = mysqli_query($conn,$get_userinfo);
    
  $result = mysqli_fetch_array($run_getuser);
$userID = $result['userID'];

?>
<?php
if (isset($_POST['update_profile'])) {
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $emergencyPhone = $_POST["emerPhone"];
    $emergencyName = $_POST["emerName"];

        $update_profile = "UPDATE user SET username = '$username', phone = '$phone', email = '$email', emergencyPhone = '$emergencyPhone', emergencyName = '$emergencyName' WHERE userID = '$userID'";
        $run_update = mysqli_query ($conn, $update_profile);

        if ($run_update) {
            echo "<script>alert('Your profile updated successfully')</script>";
            echo "<script>window.open('userProfile.php?userProfile','_self')</script>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/tab.png" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>RideNow | My Profile</title>

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
        <h2>User Profile</h2>
        <p>RideNow provide you with comfortable car environment at the lowest price depends on traffic and offers. Please stay with us to experience more.</p>
      </div>
       <form action = "userProfile.php" method = "post">
      <div class="col-md-8 col-md-offset-2">
        
          <div class="row">
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Username :</label>
                <input type="text" name="username" value="<?php echo $result['username'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Phone Number :</label>
                <input type="text" name="phone" value="<?php echo $result['phone'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Email :</label>
                <input type="email" name="email" value="<?php echo $result['email'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Emergency Contact :</label>
                <input type="text" name="emerPhone" value="<?php echo $result['emergencyPhone'];?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <label style="font-size: 15px ; color: #fff;">Emergency Contact Name :</label>
                <input type="text" name="emerName" value="<?php echo $result['emergencyName']; ?>" class="form-control">
                <p class="help-block text-danger"></p>
              </div>
          </div>
          <div id="success"></div>
          <input type="submit" name="update_profile" class="btn btn-default" value="Update">
          <input type="button" name="back" class="btn btn-default" value="Back" onClick="document.location.href='bookCar.php'">
     
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