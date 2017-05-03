 <?php
  session_start();
?>

<!-- validate form -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $errorName = $errorEmail = $errorPhone = "";
   $store = true;
   //error message if fields are empty
   if(empty($_POST["name"])){
     $errorName = "Name is required.";
     $store = false;
   }
  else {
    $name = $_POST["name"];
  }
if(empty($_POST["phone"])){
    $errorPhone = "Phone number is required.";
    $store = false;
  }
  else {
    $phone = $_POST["phone"];
    $patternPhone = "/^\d{3}-\d{3}-\d{4}$/";
    if(!preg_match($patternPhone, $phone)){
      $errorPhone = "Incorrect phone format.";
      $store = false;
    }
  }
if(empty($_POST["email"])){
    $errorEmail = "Email is required.";
    $store = false;
  }
  else {
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $errorEmail = "Incorrect email format.";
      $store = false;
    }
  }
  if(empty($_POST["kidNum"]))
  {
    $store = false;
  }
  else
  {
    $kidNum = $_POST["kidNum"];
  }


}
?>