<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
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
    <h1>Rider is on board!</h1>
    <table>
        <?php
        include 'db_connection.php';

$conn = OpenCon();

//echo "Connected Successfully";

session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
  }
$bookingID = $_SESSION['bookingID'];
        $phone = $_SESSION['loginUser'];
        $get_info= "SELECT user.username, booking.phone, booking.current, booking.destination FROM user INNER JOIN booking ON user.phone = booking.phone WHERE driverPhone = $phone ORDER by bookingID desc limit 1";

        $run_getrider = mysqli_query($conn,$get_info);
        
    $res = mysqli_fetch_array($run_getrider);
    

        $info_userName = $res['username'];
        $info_userPhone = $res['phone'];
        $info_current = $res['current'];
        $info_destination = $res['destination'];
        $_SESSION['userPhone'] = $info_userPhone;
echo "
        
                    <tbody>

                    <tr>
                            <td style='width:12em;'>Rider's Name</td>
                            <td style='width:2em;'>:</td>
                            <td style='width:40em;'>$info_userName</td>

                        </tr>
                         <tr>
                            <td>Rider's Phone</td>
                            <td>:</td>
                            <td>$info_userPhone</td>
                        </tr>
                        <tr>
                            <td>Rider's Current Location</td>
                            <td>:</td>
                            <td>$info_current</td>
                        </tr>
                        <tr>
                            <td>Rider's Destination</td>
                            <td>:</td>
                            <td>$info_destination</td>
                        </tr>
                        </tbody>
                        ";?>
<input type="button" name="dropRider" value="Drop" onclick="dropRider()"> 

    </table>
</div>

    <div id="map"></div>

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
</body>
</html>