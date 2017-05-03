
 <?php 
    include ("header.php"); 
 ?>
<?php
//	session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <b id="welcome">Welcome : <i><?php echo $_SESSION['login_user']; ?></i></b>
  <b id="logout"><a href="logout.php">Log Out</a></b>

  <?php
        $db_host = "dbserver.engr.scu.edu";
        $db_user = "smangala";
        $db_pass = "00000925472";
        $db_name = "sdb_smangala";
	$locations ="";
        $con_forum = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	
	$sql_search = "SELECT Email, Location FROM Informationt";
	//echo $_SESSION['login_user'];
	if($result = mysqli_query($con_forum, $sql_search))
	{
		while($obj = mysqli_fetch_object($result))
		{
//			echo $_SESSION['login_user']; 

//			echo $obj->Email; 
			if($obj->Email == $_SESSION['login_user'])
			{
				$locations = $obj->Location;
//				echo 'ys';
				
			}
			//printf("%s\n",$obj->Location);
			//echo $locations;
		}
	}
	else
	{
		echo "Error!";
}
//	echo $locations;
	if($locations == "Santa Clara")
	{
	  echo '<div class="center-block" style="display: block;">
            <h2 class="headersforactivities1">Schedule</h2>
              <table class="table table-bordered" style="width:30%">
                <thead>
                 <tr>
                  <th>Time</th>
                  <th>Activities</th>
                 </tr>
                </thead>
                <tbody>
                 <tr>
                  <td>10:00-12:00</td>
                  <td>Computer-Based Activities</td>
                 </tr>
                 <tr>
                  <td>12:00-12:30</td>
                  <td>Lunch</td>
                 </tr>
                 <tr>
                  <td>12:30-1:30</td>
                  <td>Outdoor Activities</td>
                 </tr>
                 <tr>
                  <td>2:00</td>
                  <td>Go home!</td>
                 </tr>
                </tbody>
              </table>
          </div>
	  ';
	}
	else
	{
	    echo '<div class="center-block" style="display: block;">
            <h2 class="headersforactivities1">Schedule</h2>
              <table class="table table-bordered" style="width:30%">
                <thead>
                 <tr>
                  <th>Time</th>
                  <th>Activities</th>
                 </tr>
                </thead>
                <tbody>
                 <tr>
                  <td>8:30-9:00</td>
                  <td>Wake Up</td>
                 </tr>
                 <tr>
                  <td>9:00-9:30</td>
                  <td>Breakfast</td>
                 </tr>
                 <tr>
                  <td>9:30-12:30</td>
                  <td>Outdoor Activities</td>
                 </tr>
                 <tr>
                  <td>12:30-1:00</td>
                  <td>Lunch</td>
                 </tr>
                 <tr>
                  <td>1:00-2:00</td>
                  <td>Break/Playtime</td>
                 </tr>
                 <tr>
                  <td>2:00-6:00</td>
                  <td>Computer-Based Activities</td>
                 </tr>
                 <tr>
                  <td>6:00-7:00</td>
                  <td>Dinner</td>
                 </tr>
                 <tr>
                  <td>7:00-8:30</td>
                  <td>Break/Playtime</td>
                 </tr>
                 <tr>
                  <td>8:30-9:00</td>
                  <td>Get Ready for Bed/Sleep</td>
                 </tr>
                </tbody>
              </table>
          </div>';

	}
?>
</body>
</html>
