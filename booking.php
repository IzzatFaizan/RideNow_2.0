<?php
include 'db_connection.php';
$conn = OpenCon();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $mconn->connect_error);
}


session_start();
if(isset($_SESSION['loginUser'])) {
  echo "Your session is running " . $_SESSION['loginUser'];
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
<html>
<body>
	<form action="ride.php" method="post">
  <table>
  	<?php
            echo "
		
                    <tbody>

                    <tr>
							<td style='width:12em;'>Platform Name</td>
							<td style='width:2em;'>:</td>
							<td style='width:40em;'>$platformName</td>

						</tr>
						<tr>
							<td>Current Location</td>
							<td>:</td>
							<td>$current</td>
						</tr>
						<tr>
							<td>Destination</td>
							<td>:</td>
							<td>$destination</td>
						</tr>
						<tr>
							<td>Price</td>
							<td>:</td>
							<td>$price</td>
						</tr>
			
					</tbody>
						";?>
						<tr>
							<input type="submit" name="confirm" class="button" value="Confirm"> 
						</tr>
        </table>
</form>
	</body>
</html>
