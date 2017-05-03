<?php

$name = $phone = $email = $credit = $errorCredit = $location = $errorLocation = $errorName = $errorEmail = $errorPhone = $errorKidName = $errorDOB = $errorGrade = $errorSchool = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $store = true;
   //error message if fields are empty
   if(empty($_POST["name"])){
     $errorName = "Name is required";
     $store = false;
   }
  else {
    $name = $_POST["name"];
  }
if(empty($_POST["phone"])){
    $errorPhone = "Phone number is required";
    $store = false;
  }
  else {
    $phone = $_POST["phone"];
    $patternPhone = "/^\d{3}-\d{3}-\d{4}$/";
    if(!preg_match($patternPhone, $phone)){
      $errorPhone = "Incorrect phone format";
      $store = false;
    }
  }
if(empty($_POST["email"])){
    $errorEmail = "Email is required";
    $store = false;
  }
  else {
    $email = $_POST["email"];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      $errorEmail = "Incorrect email format";
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
 if(empty($_POST["location"])){
    $errorLocation = "Location is required";
    $store = false;
  }
  else {
    $location = $_POST["location"];
    $patternLocation = "/Santa Clara|San Francisco/";
    if(!preg_match($patternLocation, $location)){
      $errorLocation = "Type in two of our provided locations";
      $store = false;
    }
 }
if(empty($_POST["credit"])){
    $errorCredit = "Credit card number is required";
    $store = false;
  }
else
  {
    $credit = $_POST["credit"];
  }
}
?>
