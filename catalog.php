<!--<?php 
	session_start();// Start the session before you write your HTML page
?>-->
 <?php 
    include ("inventory.php"); 	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
	<title>Catalog </title>
	<style type="text/css">
		.viewcat3
		{
			display: block;
			margin:auto;
		}
	</style>
  <script>
    var hash = document.location.hash;
var prefix = "tab_";
if (hash) {
    $('.nav-tabs a[href='+hash.replace(prefix,"")+']').tab('show');
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});
  </script>
</head>
<body>
	<p class="viewcat3"> 
    	<a href="viewCart.php?show">View Shopping Cart</a> 
    	<br/> <br/>
		<a href="viewCart.php?checkout">Checkout</a> 
    	<br/> <br/>
    	<a href="viewCart.php?clear">Clear Shopping Cart</a>
	<br/> <br/>
   	<a href='login1.php'>Login to Get 15% Off!</a>
	</p> 
		<?php
		global $items;
		global $prices;
		global $images;
		foreach($items as $key => $value)
		{
			$fullname = $items[$key];
			$price = $prices[$key];
			$image = $images[$key];
			echo "
				<div class='cat'>
					<img src='$image.png' alt='$image'>
					</br>
					$fullname
					</br>
					$$price
					</br>
					<a href='viewCart.php?add=$key'>Add to cart</a> 
					</br>
					
				</div>";
		}
	?>

  </body>
</html>
