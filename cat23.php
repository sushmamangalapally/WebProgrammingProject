 <!DOCTYPE html>
<html>
<style>
#cat3
{
	display:block;
}

#cat4
{
	
	float:bottom;
}
</style>
<body>    

<div id="catalog" class="tab-pane fade">
  <h3>Catalog</h3>
<div id="cat3">
  <?php 
  include ("catalog.php"); 	
  ?>
  </div>
<div id="cat4">
<?php
//  include("footer.php");
?>
</div>
      </div>
</body>
<?php
 // include("footer.php");
?>
</html>
