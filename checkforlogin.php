
<!DOCTYPE html>
<html>
<?php   
				session_start();   		  	
      		  	if(isset($_SESSION['login_user']))
      		  	{
      		  		echo "<p style='float:right'>Logged in as ".$_SESSION['login_user']."</br> "."<a href='sched.php'>Click Here to See Info</a>"."</br>";
      		  		echo "<a href='logout.php'>Log Out</a></p>"; 
      		  	}
      		  	else
      		  	{
      		  		echo "<p style='float:right'><a href='login1.php'>Have Account? Please Log In!</a></p>";
      		  	}
?>
</html>
