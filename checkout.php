<!--<?php
	session_start(); /* using this function to remember input fields -> Bonus  */
?>-->

<?php
	$say = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<style>
		.formforcatalog
		{
			width: 500px;
			padding: 55px;
		}
		.error
		{
			color: red;
		}
	</style>
</head>
<body>
	<?php
		$cmail = $cfirstname = $clastname = $caddress = $ccity = $ccountry = $cstate = $czipcode = $creditcardnum = $expdate = "";
		$cmailerr = $cfirstnameerr = $clastnameerr = $caddresserr = $ccityerr = $ccountryerr = $cstateerr = $czipcodeerr = $creditcardnumerr = $expdateerr = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["cmail"])) {
     $cmailerr = "Email is required";
   } else {
     $cmail = test_input($_POST["cmail"]);
   }
   
   if (empty($_POST["cfirstname"])) {
     $cfirstnameerr = "First Name is required";
   } else {
     $cfirstname = test_input($_POST["cfirstname"]);
   }
     
   if (empty($_POST["clastname"])) {
     $clastnameerr = "Last Name is required";
   } else {
     $clastname = test_input($_POST["clastname"]);
   }

   if (empty($_POST["caddress"])) {
     $caddresserr = "Address is required";
   } else {
     $caddress = test_input($_POST["caddress"]);
   }

   if (empty($_POST["ccity"])) {
     $ccityerr = "City is required";
   } else {
     $ccity = test_input($_POST["ccity"]);
   }
   if (empty($_POST["ccountry"])) {
     $ccountryerr = "Country is required";
   } else {
     $ccountry = test_input($_POST["ccountry"]);
   }
     
   if (empty($_POST["cstate"])) {
     $cstateerr = "State is required";
   } else {
     $cstate = test_input($_POST["cstate"]);
   }

   if (empty($_POST["czipcode"])) {
     $czipcodeerr = "Zip Code is required";
   } else {
     $czipcode = test_input($_POST["czipcode"]);
   }

   if (empty($_POST["creditcardnum"])) {
     $creditcardnumerr = "Credit Carde Number is required";
   } else {
     $creditcardnum = test_input($_POST["creditcardnum"]);
   }
   
   if (empty($_POST["expdate"]) || $_POST["expdate"]="") {
     $expdateerr = "Expiration Date is required";
   } else {
     $expdate = test_input($_POST["expdate"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
	?>
	<?php
		$var = "";
		if(isset($_SESSION['login_user']))
		{
			$var=$_SESSION['login_user'];
		}
		else
		{
			$var="bjones@mail.com";
		}
		
	?>
<form method="post"  enctype='multipart/form-data' name="typein" role="form" class="formforcatalog" action="">
  <div class="form-group">
  	Email Address:<input type="text" class="form-control" name="cmail" placeholder="Your Email Address" value="<?php echo $var; ?>">
  	<span class="error">* <?php echo $cmailerr;?></span>
  	</br>
    First Name:<input type="text" class="form-control" name="cfirstname" placeholder="Your First Name" value="Bob">
	<span class="error">* <?php echo $cfirstnameerr;?></span>
	</br>
    Last Name:<input type="text" class="form-control" name="clastname" placeholder="Your Last Name" value="Jones">
	<span class="error">* <?php echo $clastnameerr;?></span>
	</br>    
	Address:<input type="text" class="form-control" name="caddress" value="500 El Camino Real">
	<span class="error">* <?php echo $caddresserr;?></span>
	</br>
    City:<input type="text" class="form-control" name="ccity" placeholder="Your City" value="Santa Clara">
	<span class="error">* <?php echo $ccityerr;?></span>
	</br>  
	Country:<input type="text" class="form-control" name="ccountry" placeholder="Your Country" value="United States">
	<span class="error">* <?php echo $ccountryerr;?></span>
	</br>
    State:<input type="text" class="form-control" name="cstate" placeholder="Your State Initials" value="CA">
	<span class="error">* <?php echo $cstateerr;?></span>
	</br>
    Zip Code:<input type="text" class="form-control" name="czipcode" placeholder="Your Zip Code" value="95053">
	<span class="error">* <?php echo $czipcodeerr;?></span>
	</br> 
    Credit Card Number:<input type="text" class="form-control" name="creditcardnum" placeholder="Your Credit Cared #" value="123456789" >
	<span class="error">* <?php echo $creditcardnumerr;?></span>
	</br> 
    Expiration Date:<input type="text" class="form-control" name="expdate" placeholder="MM/YY" >
	<span class="error">* <?php echo $expdateerr;?></span>
	</br> 	
	<input type="submit" name="submitforcat" class="btn btn-default"/> 
	</br> 
  </div>
</form>
<?php
	if(isset($_POST['submitforcat'])) {
		echo '<h2>"Your order will arrive shortly"</h2>';
	}
?>
</body>
</html>
