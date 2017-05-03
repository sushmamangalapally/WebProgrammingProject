
<!DOCTYPE html>
<html>
<head>
<style>
  
</style>
</head>
<body>    
<div id="forum" class="tab-pane fade">
  <h3>Forum</h3>
  <?php
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
		$sqlforcomment = "SELECT * FROM Commentsforforum";
		//$com = mysqli_query($con, $sqlforcomment);
		$result = $con->query($sqlforcomment);
		 if (!$result)
  		{
    			die('Error: ' . mysqli_error($con));
  		}
	
  		echo "<table class='table table-bordered'>
<tr>
<th>Author</th>
<th>Comments</th>
</tr>";

while($row = mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>" . $row['author'] . "</td>";
echo "<td>" . $row['comment'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
  ?>
 
<?php  
if(isset($_SESSION['login_user']))
{
echo'
  <form action="" method="post" id="forum1">
  	Name:
  </br>
    <input type="text" name="nameauthor" >
</br>
   Comment:
   </br>
   <textarea rows="10" cols="44" name="comments"></textarea>
</br>
   <input type="submit" value="Submit" name="submitforforum" />
   </br>
  </form>';

}
else
{
	echo "You must be logged in to add a review."." <a href=\"login1.php\">Login!</a>";
}

?>
<?php
 // include("foruminsert.php");

?>

<?php
        ini_set('display_errors','On');
        error_reporting(E_ALL);
	if(isset($_POST['submitforforum'])){
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
        $submit = mysqli_real_escape_string($con_forum, $_POST['submitforforum']);
        if($submit){
    $sql_comment = "INSERT INTO Commentsforforum (author, comment) VALUES ('$author', '$comment')";
    $result = mysqli_query($con_forum, $sql_comment);

          if ($result)
          {
           //     header('Location: forum.php');
          }
        echo "<h3>Review Added!</h3>";
        }

}
?>

<?php
  include("footer.php");
?>
      </div>
 </body>
</html>
