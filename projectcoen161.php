<!DOCTYPE html>
<html>
<head>
<title> EdCamps Inc</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <!-- Optional theme -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript"> 
$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});
</script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="project_coen161.css">
</head>
<body>
  <head>
        <div class="container">
	      <head>
      		  <?php
					include ("checkforlogin.php");       		  		
      		  ?>
      <figure id="logo1">
       <svg height="100" width="100">
        <polyline points="100,5 70,5 55,35 35,30 20,90 55,53 75,57 100,5" style="fill:lightyellow;stroke:orange;stroke-width:4" />
      </svg>
    </figure>

    <h1 id="logotext" >EdCamps Inc</h1>
  <ul class="nav nav-tabs nav-justified green">
      <li ><a  data-toggle="tab" href="#home">Home</a></li>
      <li><a data-toggle="tab" href="#schedandreg">Schedule and Registration</a></li>
      <li><a  data-toggle="tab" href="#catalog">Catalog</a></li>
      <li><a  data-toggle="tab" href="#forum">Forum</a></li>
      <li><a data-toggle="tab" href="#visualization">Visualization</a></li>
      <li><a  data-toggle="tab" href="#activity">Activity</a></li>
    </ul>
   </head>

      <div class="tab-content">

        <?php
          include("homepage.php");
        ?>
        <?php
          include("sched23.php");
        ?>
        <?php
          include("cat23.php");
        ?>
        <?php
          include("forum.php");
        ?>
        <?php
          include("visualization.php");
        ?>
        <?php
          include("activities.php");
        ?>
      </div>
    </div>
  </head>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<?php
 //include("footer.php");
?>
</body>
</html>
