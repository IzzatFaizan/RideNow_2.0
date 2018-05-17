<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="refresh" content="3; URL='http://localhost/ridenow/dropoffStatus.php'"/>
    <meta charset="utf-8">
    <title>Directions service</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
<body>
    <div id="floating-panel">
    <h1>Your driver will be arriving in 5 minutes</h1>
    <table>
        <?php
        include 'db_connection.php';

$conn = OpenCon();

//echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
//  echo "Your session is running " . $_SESSION['loginUser'];
  }

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
        
echo "
        
                    <tbody>

                    <tr>
                            <td style='width:12em;'>Driver Name</td>
                            <td style='width:2em;'>:</td>
                            <td style='width:40em;'>$info_driverName</td>

                        </tr>
                        <tr>
                            <td>Driver Phone</td>
                            <td>:</td>
                            <td>$info_driverPhone</td>
                        </tr>
                        <tr>
                            <td>Car Type</td>
                            <td>:</td>
                            <td>$info_carType</td>
                        </tr>
                        <tr>
                            <td>Car Plat Number</td>
                            <td>:</td>
                            <td>$info_platNo</td>
                        </tr>
                        <tr>
                            <td>Car Colour</td>
                            <td>:</td>
                            <td>$info_colour</td>
                        </tr>
                        </tbody>
                        ";?>

<button onclick="myFunction()">SOS</button>
    </table>
</div>

    <div id="map"></div>
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
</body>
</html>