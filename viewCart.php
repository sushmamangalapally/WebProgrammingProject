
<?php 
    include ("inventory.php"); 
 ?>
 <?php 
    include ("header.php"); 
 ?>
<?php
 //       session_start();
	isset($_SESSION['cart']);
?>
<?php 
// This function displays the contents of the shopping cart 
function show_cart() {
	global $items;
	global $prices;
	global $images;
    if (isset($_SESSION['cart'])){
		echo "Your Shopping Cart has the following items so far:<br/>"; 
		$mycart = $_SESSION['cart'];
		foreach ($mycart as $key => $value){
		if ($value >0){
		    // get the full items name from the items array;
			$fullname = $items[$key];
			$price = $prices[$key];
			$image = $images[$key];
			echo
				"
				<div class='cat'>
					<img src='$image.png' alt='$image'>
					</br>
					$fullname
					</br>
					$$price
					</br>";
			print("Number of $fullname = $value"."<a href="."viewCart.php?drop=$key".">    Remove</a><br/>");
			echo
				"</div>";
				
		}
	  }
	}
	else {
		echo "No items in the cart";
	
	}
}
// This function removes an item from the shopping cart
function drop() {

	 if (isset($_GET['drop'])){
	 	$dropItemId = $_GET['drop'];	
		if (isset($_SESSION['cart'])){
			$mycart = $_SESSION['cart'];
			if($mycart[$dropItemId] == 1)
			{
				unset($mycart[$dropItemId]);
			}
			else{
				$mycart[$dropItemId]-= 1;
			}
			$_SESSION['cart'] = $mycart; 			
		} 
	}
} 
// Adds an item to the shopping cart
function addToCart(){
	// Access the global array
	global $items;
	global $images;
	
	// Get the item id to add - this is the string sent with the 
	// selection when the user clicked a link
	
	$addItemId = $_GET['add'];
		 		 		
	if (isset($_SESSION['cart'])){
		$mycart = $_SESSION['cart'];
		
		// if the item already exists, increment the count
		if (isset($mycart[$addItemId])){
			$mycart[$addItemId]+= 1;									
		} 
		// if the item does not exist, add it to the cart
		else{
			$mycart[$addItemId] = 1;
		}		
	}
	else{
		// cart does not exist, create one
		$mycart = array();
		$mycart[$addItemId] = 1;
	}
    $_SESSION['cart'] = $mycart; 
	echo "
		<div class='cat'>
		<img src='$images[$addItemId].png' >
		$items[$addItemId] added to cart <br/>
		</div>
		";  
}
function clearCart(){
	if (isset($_GET['clear'])){
	 	if (isset($_SESSION['cart'])){
			unset($_SESSION['cart']); 
	  	}
		echo "<h1>Shopping Cart Cleared</h1> ";
	} 
}
function checkout()
{
	global $items;
	global $prices;
	global $images;
	$grandtotal = 0;
	$say ="";
    if (isset($_SESSION['cart'])){
		echo "Your Shopping Cart has the following items so far:<br/>"; 
		echo "<table>";
		echo "<tr><th> Item Name <th> Image <th> Number of Items  <th> Price  <th> Total Price";
		echo "<br/>";
		$mycart = $_SESSION['cart'];
		
		foreach ($mycart as $key => $value){
		if ($value >0){
		    // get the full widget name from the items array;
			$fullname = $items[$key];
			/*print("$fullname = $value"."<a href="."viewCart.php?drop=$key".
			">    Remove</a><br/>"); */
			$price = $prices[$key];
			$image = $images[$key];
	
			$totalofitem = ($value*$price);
			print("<tr>
					<td ><b>$fullname  </b></td>
					<td><img class='cat1' style='height:60px;weight:60px;' src='$image.png' alt='$fullname'></td>
					<td>$value </td>
					<td>$$price </td>
					<td>$$totalofitem</td>
				  </tr>");
			$grandtotal += $totalofitem;
			
			if(isset($_SESSION['login_user']))
			{
				
				$grandtotal = ($grandtotal*0.85);

			}

			print("</tr>");
			}
		}
		echo "</table>";

	}
	else {
		echo $say;
		echo "<h2>No items in the cart</h2>";
	
	}
	print("<br/>");
    echo "<h2>Grandtotal is: $$grandtotal</h2>";
    if(isset($_SESSION['login_user']))
    {
				
	echo "<h2>Yay! You get 15% discount on items</h2>";
    }
    
    include ("checkout.php");
  //      $say = "<h2>Your items will arrive shortly!</h2>";
 
	unset($_SESSION['cart']);
	 
//	$say = "<h2>Your items will arrive shortly!</h2>";
	//session_destroy();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
<head><title>ViewCart</title>
<style>
	table, td, th
	{
		border: 1px solid black;
		padding: 20px;
		border-radius: 20px;
	}
		.cat
		{
			padding: 35px;
			display: block;
			float: left;
		}
		.cat img{
			width: 250px;
			height: 250px;
		}
	.viewcat
	{
		display:block;
		height: 80;
		width:200px;
		border: none;
		float:left;
		position: relative;
		left: 100px;
	} 
	.blockforview
	{
		margin: 80px;
		margin-left: 110px;
		border:none;
		display: block;
	}
</style>
</head>
<body>
	<p class="viewcat"> 
    <a href="projectcoen161.php#catalog">Back to the Catalog</a> 
</p> 
	<div class="blockforview">
<?php
	// if user has chosen "add"
	if ( isset($_GET['add'])) { 
		addToCart();
		unset($_GET['add']);
	}
	// if user has chosen "show cart"	
	elseif (isset($_GET['show'])){ 
       		
		show_cart();
		unset($_GET['show']);	
	}
	// if user has chosen "clear cart"	
	elseif (isset($_GET['clear'])){ 
		clearCart();
		unset($_GET['clear']);	
	}
	// if user has chosen "remove item from cart"		
	elseif (isset($_GET['drop'])){ 
		drop();
		unset($_GET['drop']);	
	}// if user has chosen "remove item from cart"		
	elseif (isset($_GET['checkout'])){ 
		checkout();
		unset($_GET['checkout']);	
	}	   	
?>
	</div>
 </body>
</html>
