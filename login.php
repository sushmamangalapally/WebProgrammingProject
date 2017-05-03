<?php
	session_start(); // Starting Session
	ini_set('display_errors','On');
        error_reporting(E_ALL);
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
		//username and password sent from form
		$parentemail = mysqli_real_escape_string($con, $_POST['parentEmail']);
		$kidname = mysqli_real_escape_string($con, $_POST['parentName']);
		
		$sql = "SELECT * FROM Informationt WHERE Email = '$parentemail'";
		$query = mysqli_query($con, $sql);
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {
			$_SESSION['login_user']=$parentemail; // Initializing Session
			header("Location: sched.php"); // Redirecting To Other Page
		} 
		else {
			include('registernow.php');
		}
	
	 mysqli_close($con); 
?>