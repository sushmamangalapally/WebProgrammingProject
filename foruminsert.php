<?php
	ini_set('display_errors','On');
	error_reporting(E_ALL);

        $db_host = "dbserver.engr.scu.edu";
        $db_user = "smangala";
        $db_pass = "00000925472";
        $db_name = "sdb_smangala";
        $con_forum = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  	$comment = mysqli_real_escape_string($con_forum, $_POST['comments']);
  	$author = mysqli_real_escape_string($con_forum, $_POST['nameauthor']);
  	$submit = mysqli_real_escape_string($con_forum, $_POST['submit']);
  	if($submit){
    $sql_comment = "INSERT INTO Commentsforforum (author, comment) VALUES ('$author', '$comment')";
    $result = mysqli_query($con_forum, $sql_comment);
         
          if ($result)
          {
                header('Location: forum.php');
          }
        echo "<h3>Review Added!</h3>";
        }

?> 
