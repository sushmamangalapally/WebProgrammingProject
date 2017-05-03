<?php
        $db_host = "dbserver.engr.scu.edu";
        $db_user = "smangala";
        $db_pass = "00000925472";
        $db_name = "sdb_smangala";
        $con_ses = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

		// Selecting Database
		// Storing Session
		$user_check=$_SESSION['login_user'];
		$user_location=$_SESSION['locations_user'];
		// SQL Query To Fetch Complete Information Of User
		$ses_sql = "SELECT * FROM Informationt WHERE Email = '$parentemail'";
				$query_ses = mysqli_query($con_ses, $ses_sql);
						$rows_ses = mysqli_fetch_assoc($query_ses);


$login_session =$row['Email'];
/*if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: projectcoen161.php#home'); // Redirecting To Home Page
} */
?>
