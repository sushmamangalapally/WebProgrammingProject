<?php
	if(isset($_POST['submit'])){
        $db_host = "dbserver.engr.scu.edu";
        $db_user = "smangala";
        $db_pass = "00000925472";
        $db_name = "sdb_smangala";
        $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        // Check connection
        if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sql = "INSERT INTO Informationt (ParentName, Email, Location) VALUES ('$_POST[name]', '$_POST[email]', '$_POST[location]')";
          $result = $con->query($sql);
          if (!$result)
          {
                die('Error: ' . mysqli_error($con));
          }
        echo "1 record added";
        mysqli_close($con);
}
?>

