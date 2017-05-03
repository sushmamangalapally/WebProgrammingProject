

<!DOCTYPE html PUBLIC "-//WC3//DTD XHTML 1.0 transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<style type="text/css">
  #schedList {
    width: 100%;
    border: 5px outset darkred;
    padding: 5px;
    margin: 10px;
    text-align: center;
  }
  th {
    text-align: center;
  }
  .error {
    color: red;
  }
  #childInfo {
    visibility: hidden;
  }
  #finish {
     text-align: center;
     margin-top: -40%;
     font-size: 180%;
  }

</style>
</head>
<body onload="registerHandler();checkForm();">

<h3>Schedule and Registration</h3>
<script type="text/javascript">
  var check = 0;
  function expandDiv(){
    document.getElementById('preReq').style.visibility = "hidden";
    var kidNumber = document.getElementById("kidNum").value;
    localStorage.setItem("kidNumber",kidNumber);
    var kidDiv = document.getElementById("childInfo");
    document.getElementById('childInfo').style.visibility = "visible";
    //write html input into form for every number of children
    for(var j = 0; j < kidNumber; j++){
      kidDiv.innerHTML += '<label for="name">Name*</label>';
      kidDiv.innerHTML += '<input type="text" name="kidName" id="kidName'+j+'" maxlength="50" />';
      kidDiv.innerHTML += '<span class="error"></span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="DOB">DOB (mm/dd/yyyy)*</label>';
      kidDiv.innerHTML += '<input type="text" name="DOB" id="DOB'+j+'" maxlength="10" />';
      kidDiv.innerHTML += '<span class="error"></span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="grade">Grade Level (x)*</label>';
      kidDiv.innerHTML += '<input type="text" name="grade" id="gradeLevel'+j+'" maxlength="1" />';
      kidDiv.innerHTML += '<span class="error"></span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="grade">School Name*</label>';
      kidDiv.innerHTML += '<input type="text" name="school" id="schoolName'+j+'" maxlength="50" />';
      kidDiv.innerHTML += '<span class="error"></span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="special">Special Instructions/Allergies</label>';
      kidDiv.innerHTML += '<input type="text" name="special" id="specialInfo'+j+'" maxlength="100" />';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="duration">Camp Duration (1 or 2)*</label>';
      kidDiv.innerHTML += '<input type="text" name="duration" id="duration'+j+'" maxlength="1" />';
      kidDiv.innerHTML += '<span class="error"></span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<br>';
      var check = 1;
      localStorage.setItem("check",check);
    }
  }
function getKidInfo(){
  //retrieve user values for child information
  for(var j = 0; j < localStorage.getItem("kidNumber"); j++){
    eval("var sameKidName" + j + " = document.getElementById('kidName" + j + "').value;");
    eval("localStorage.setItem('sameKidName" + j + "',sameKidName" + j + ");");
    eval("var sameDOB" + j + " = document.getElementById('DOB" + j + "').value;");
    eval("localStorage.setItem('sameDOB" + j + "',sameDOB" + j + ");");
    eval("var sameGradeLevel" + j + " = document.getElementById('gradeLevel" + j + "').value;");
    eval("localStorage.setItem('sameGradeLevel" + j + "',sameGradeLevel" + j + ");");
    eval("var sameSchoolName" + j + " = document.getElementById('schoolName" + j + "').value;");
    eval("localStorage.setItem('sameSchoolName" + j + "',sameSchoolName" + j + ");");
    eval("var sameSpecialInfo" + j + " = document.getElementById('specialInfo" + j + "').value;");
    eval("localStorage.setItem('sameSpecialInfo" + j + "',sameSpecialInfo" + j + ");");
    eval("var sameDuration" + j + " = document.getElementById('duration" + j + "').value;");
    eval("localStorage.setItem('sameDuration" + j + "',sameDuration" + j + ");");
  }
 validateInfo();
}

function validateInfo(){
  localStorage.setItem("done",0);
  for(var j = 0; j < localStorage.getItem("kidNumber"); j++){
    eval("var errorKidName" + j + " = '';");
    eval("var errorDOB" + j + " = '';");
    eval("var errorGradeLevel" + j + " = '';");
    eval("var errorSchoolName" + j + " = '';");
    eval("var errorDuration" + j + " = '';");
    //check if empty
    if(eval("document.getElementById('kidName" + j + "').value") == ""){
      eval("errorKidName" + j + " = 'Child name is required.';");
      localStorage.setItem("done",1);
    }
    //check if empty
    if(eval("document.getElementById('DOB" + j + "').value") == ""){
      eval("errorDOB" + j + " = 'DOB is required.';");
      localStorage.setItem("done",1);
    }
    else{ //check if correct format
      var patternDOB = /^(\d{2})\/(\d{2})\/(\d{4})$/;
      if(patternDOB.test(eval("document.getElementById('DOB" + j + "').value")) == false){
        eval("errorDOB" + j + " = 'Wrong DOB format.';");
      localStorage.setItem("done",1);
      }
    }
    if(eval("document.getElementById('gradeLevel" + j + "').value") == ""){
      eval("errorGradeLevel" + j + " = 'Child grade is required.';");
      localStorage.setItem("done",1);
    }
    if(eval("document.getElementById('schoolName" + j + "').value") == ""){
      eval("errorSchoolName" + j + " = 'School Name is required.';");
      localStorage.setItem("done",1);
    }
    if(eval("document.getElementById('duration" + j + "').value") == ""){
      eval("errorDuration" + j + " = 'Duration is required.';");
      localStorage.setItem("done",1);
    }
    else if(eval("document.getElementById('duration" + j + "').value") > 2){
      eval("errorDuration" + j + " = 'Wrong duration format. Enter 1 or 2.';");
      localStorage.setItem("done",1);
    }
    eval("localStorage.setItem('errorKidName" + j + "',errorKidName" + j + ");");
    eval("localStorage.setItem('errorDOB" + j + "',errorDOB" + j + ");");
    eval("localStorage.setItem('errorGradeLevel" + j + "',errorGradeLevel" + j + ");");
    eval("localStorage.setItem('errorSchoolName" + j + "',errorSchoolName" + j + ");");
    eval("localStorage.setItem('errorDuration" + j + "',errorDuration" + j + ");");
  }
}

function removeKidInfo(){
  for(var j = 0; j < localStorage.getItem("kidNumber"); j++){
    eval("localStorage.removeItem('sameKidName" + j + "',sameKidName" + j + ");");
    eval("localStorage.removeItem('sameDOB" + j + "',sameDOB" + j + ");");
    eval("localStorage.removeItem('sameGradeLevel" + j + "',sameGradeLevel" + j + ");");
    eval("localStorage.removeItem('sameSchoolName" + j + "',sameSchoolName" + j + ");");
    eval("localStorage.removeItem('sameSpecialInfo" + j + "',sameSpecialInfo" + j + ");");
    eval("localStorage.removeItem('sameDuration" + j + "',sameDuration" + j + ");");
  }
}

function removeError(){
  for(var j = 0; j < localStorage.getItem("kidNumber"); j++){
    eval("localStorage.setItem('errorKidName" + j + "','');");
    eval("localStorage.setItem('errorDOB" + j + "','');");
    eval("localStorage.setItem('errorGradeLevel" + j + "','');");
    eval("localStorage.setItem('errorSchoolName" + j + "','');");
    eval("localStorage.setItem('errorDuration" + j + "','');");
  }
}

function calcFee(){
  var price = 0;
  for(var j = 0; j < localStorage.getItem("kidNumber"); j++){
    if(eval("localStorage.getItem('sameDuration" + j + "')") == 2){
      if(j > 0){
        price += (50 - (50*.1));
      }
      else{
        price += 50;
      }
    }
    else{
      if(j > 0){
        price += (25 - (25*.1));
      }
      else{
        price += 25;
      }
    }
  }
  return price;
}

function expandSameDiv(){
  document.getElementById('preReq').style.visibility = "hidden";
  document.getElementById('childInfo').style.visibility = "visible";
  var kidNumber = localStorage.getItem("kidNumber");
  var kidDiv = document.getElementById("childInfo");
  //write html input into form for every number of children
    for(var j = 0; j < kidNumber; j++){
      kidDiv.innerHTML += '<label for="name">Name*</label>';
      kidDiv.innerHTML += '<input type="text" name="kidName" value="'+eval("localStorage.getItem('sameKidName" + j + "')")+'" id="kidName'+j+'" maxlength="50" />';
      kidDiv.innerHTML += '<span class="error">' + eval("localStorage.getItem('errorKidName" + j + "')") + '</span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="DOB">DOB (mm/dd/yyyy)*</label>';
      kidDiv.innerHTML += '<input type="text"  value="'+eval("localStorage.getItem('sameDOB" + j + "')")+'" name="DOB" id="DOB'+j+'" maxlength="10" />';
      kidDiv.innerHTML += '<span class="error">' + eval("localStorage.getItem('errorDOB" + j + "')") + '</span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="grade">Grade Level (x)*</label>';
      kidDiv.innerHTML += '<input type="text" value="'+eval("localStorage.getItem('sameGradeLevel" + j + "')")+'" name="grade" id="gradeLevel'+j+'" maxlength="1" />';
      kidDiv.innerHTML += '<span class="error">' + eval("localStorage.getItem('errorGradeLevel" + j + "')") + '</span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="grade">School Name*</label>';
      kidDiv.innerHTML += '<input type="text" value="'+eval("localStorage.getItem('sameSchoolName" + j + "')")+'" name="school" id="schoolName'+j+'" maxlength="50" />';
      kidDiv.innerHTML += '<span class="error">' + eval("localStorage.getItem('errorSchoolName" + j + "')") + '</span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="special">Special Instructions/Allergies</label>';
      kidDiv.innerHTML += '<input type="text" value="'+eval("localStorage.getItem('sameSpecialInfo" + j + "')")+'" name="special" id="specialInfo'+j+'" maxlength="100" />';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<label for="duration">Camp Duration (1 or 2)*</label>';
      kidDiv.innerHTML += '<input type="text" value="'+eval("localStorage.getItem('sameDuration" + j + "')")+'" name="duration" id="duration'+j+'" maxlength="1" />';
      kidDiv.innerHTML += '<span class="error">' + eval("localStorage.getItem('errorDuration" + j + "')") + '</span>';
      kidDiv.innerHTML += '<br>';
      kidDiv.innerHTML += '<br>';
    }
    //if successfully filled out form
    if(localStorage.getItem("done") == 0){
      var totalPrice = calcFee();
      document.getElementById("finish").innerHTML += '<h4>Successful Registration!</h4><p>Price: $' + totalPrice + '</p><p>Thank you for joining EdCamps!</p>';
      document.getElementById("thisForm").style.visibility = "hidden";
      document.getElementById("childInfo").style.visibility = "hidden";

    }
    removeKidInfo();
    removeError();
}


function checkForm() {
  if(!(/schedandreg/.test(window.location.href))){
    localStorage.setItem("check",0);
  }
  var newCheck = localStorage.getItem("check");
      if(newCheck == 1){
        expandSameDiv();
  }
}
function registerHandler(){
    document.getElementById("expandKid").addEventListener("click",expandDiv,false);
  }
</script>

<!-- validate form -->
<?php
  include("pValidation.php");
?>
<hr>
<div>
  <span style="font-size:20px">Prices:</span>
  <ul style="list-style-type:none">
    <li>1 Week: $25</li>
    <li>2 Weeks: $50</li>
  </ul>
  <span style="font-size:10px">*If you register more than 1 child, you get 10% off each additional child!</span>
</div>
<hr>
<div>
  <table id="schedList" border="1">
    <tr>
      <th>Camp Sites</th>
      <th>Camp Dates</th>
    </tr>
    <tr>
      <td>San Francisco</td>
      <td>June 6 - June 17</td>
    </tr>
      <td>Santa Clara</td>
      <td>July 11 - July 22</td>
    </tr>
  </table>
</div>
<!-- registration form -->
<div id="thisForm">
      <legend>Register Your Camper(s)</legend>
      <p id="note">Required fields marked with *</p>
      <hr>
    <div id="preReq">
      <label for="number">How many children are you registering?</label>
      <input type="text" name="kidNum" id="kidNum" maxlength="2" />
      <button id="expandKid">+</button>
      <hr>
    </div>
 <form name="myForm" method="post" action="projectcoen161.php#schedandreg" onsubmit="getKidInfo();">
    <fieldset>
      <label for="name">Name*</label>
      <input type="text" value="<?php echo $name;?>" name="name" id="name" maxlength="50" />
      <span class="error"><?php echo $errorName;?></span>
      <br>
      <label for="phone">Phone (xxx-xxx-xxxx)*</label>
      <input type="text"  value="<?php echo $phone;?>" name="phone" id="phone" maxlength="12" />
      <span class="error"><?php echo $errorPhone;?></span>
      <br>
      <label for="email">Email*</label>
      <input type="text" value="<?php echo $email;?>" name="email" id="email" maxlength="50" />
      <span class="error"><?php echo $errorEmail;?></span>
      <br>
      <label for="location">Camp Location*</label>
      <input type="text" value="<?php echo $location;?>" name="location" id="location" maxlength="50" />
      <span class="error"><?php echo $errorLocation;?></span>
      <br>
      <label for="credit">Credit Card Number*</label>
      <input type="text" value="<?php echo $credit;?>" name="credit" id="credit" maxlength="19" />
      <span class="error"><?php echo $errorCredit;?></span>
      <hr>
      <h4>Child Information</h4>
      <hr>
      <div id="childInfo">
      </div>
      <input type="submit" id="submit" name="submit" value="Submit">
      <?php
        if(isset($_POST['submit'])){
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
        $sql = "INSERT INTO Informationt (ParentName, Email, Location) VALUES ('$_POST[name]', '$_POST[email]', '$_POST[location]')";
          $result = $con->query($sql);
          if (!$result)
          {
                die('Error: ' . mysqli_error($con));
          }
        echo "1 record added";
        mysqli_close($con);
}
?>
    </fieldset>
  </form>
</div>
<div id="finish">
</div>

</body>
</html>

<?php
include("footer2.php");
?>

