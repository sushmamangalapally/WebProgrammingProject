<!--<?php

if(isset($_SESSION['login_user'])){
	header("location: sched.php");
}
?>-->

 <?php 
    include ("header.php"); 
 ?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
	<div id="main">
		<h1>Login</h1>
		<div id="login">
			<h2>Login Form</h2>
				<form action="login.php" method="post">
					<label>Parent Email :</label>
						<input id="name" name="parentEmail" placeholder="parentEmail" type="text">
					<label>Name :</label>
						<input id="name" name="parentName" placeholder="child" type="text">
					<input name="submitforlogin" type="submit" value=" Login ">
					
				</form>
		</div>
	</div>
	</body>
</html>