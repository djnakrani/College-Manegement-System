<!DOCTYPE HTML>
<html>
<head>
    <title>College Management</title>
	<!-- Bootstrap -->
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "icon" href="css/banner/logo1.png" type = "image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="css/registration.css">

  <!-- CUSTOM JS-->
  <script src="js/validation.js"></script>
</head>
<body>
<?php
  include_once("connection.php");
?>
  <h1>FACULTY REGISTRATION</h1>
  <form name="regfaculty" action="insertphp.php" onsubmit="validation()" enctype="multipart/form-data" method="post">
  <div class="personal-one">
    <div class="head-reg"><h5>College Information:</h5></div>
    <div class="form-inline">
      <div class="row container">
        Employee Code:-<input type="text" class="form-control" name="empcode" placeholder="Enter Your Private Code" oninvalid="empnum(this);" oninput="empnum(this);" minlength="10" maxlength="10" pattern="^[F][0-9]+$" required>
      </div>
    </div>
  </div>
  <div class="personal-one">
    <div class="head-reg"><h5>Personal Information:</h5></div>
      <div class="form-inline">
        <div class="row container margin-form">
  			    <div class="col-xs-12 col-sm-12 col-md-12">
              Full Name:-<input class="form-control" type="text" name="Firstname" oninvalid="character(this);" oninput="character(this);" pattern="[A-Za-z ]+" placeholder="First Name" required>
  			   	</div>
  			 </div>
  		 </div>
    <div class="form-inline">
      <div class="row container margin-form">
          <div class="col-xs-12 col-sm-4 col-md-4">
            Mobile No:-<input class="form-control" type="text" name="Mobileno" maxlength="10" oninvalid="number(this);" oninput="number(this);" pattern="[9,8,7,6][0-9]+" placeholder="Mobile Number" required>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-8">
            Email Id:-<input class="form-control" type="gmail" name="Mailid" oninvalid="mail(this);" oninput="mail(this);" placeholder="Email Id" required>
          </div>
       </div>
    </div>
    <div class="form-inline">
      <div class="row container margin-form">
          <div class="col-xs-12 col-sm-6 col-md-6">
            Date Of Birth:-<input class="form-control" type="date" max="2000-01-01" oninvalid="dob(this);" oninput="dob(this);" name="DateOfBirth"  Required>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            Gender:-<input type="radio"  name="Gender" value="M" checked>&nbsp;Male &ensp;<input type="radio" name="Gender" value="F">&nbsp;Female
          </div>
       </div>
    </div>
    <div class="form-inline">
      <div class="row container-fluid">
        <div class="col-xs-12 col-sm-12 col-md-12">
        Address:-<textarea class="form-control" style="width:100%;" name="Address" placeholder="Address" Required></textarea>
        </div>
     </div>
    </div>
  </div>
  <div class="personal-one">
    <div class="head-reg"><h5>Admission Information:</h5></div>
    <div class="form-inline ">
      <div class="row container">
        <div class="col-xs-12 col-sm-4 col-md-4">
          Date Of Join:-<input class="form-control" type="date" min="2008-01-01" oninvalid="dob(this);" oninput="dob(this);" name="DateOfJoin"  Required>
        </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            Qualification:-<input class="form-control" type="text" name="Qualification" oninvalid="character(this);" oninput="character(this);" pattern="[A-Za-z\.]+" placeholder="Qualification" required>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            Experiance:-<input class="form-control" type="text" name="Experiance" oninvalid="number(this);" oninput="number(this);" pattern="[0-9]+" maxlength="2" placeholder="In Year" required>
          </div>
       </div>
    </div>
  </div>
  <div class="personal-one">
  <div class="head-reg"><h5>Image:</h5></div>
  <div class="form-inline">
    <div class="row container">
        Image:-<input type="file" name="Image" oninvalid="file(this);" oninput="file(this);" required>
    </div>
    </div>
  </div>
  </div>
  <div class="personal-one">
    <div class="head-reg"><h5>Security:</h5></div>
    <div class="form-inline">
      <div class="row container">
          <div class="col-xs-12 col-sm-4 col-md-4">
            Username:-<input class="form-control" type="text" name="Username" oninvalid="username(this);" oninput="username(this);" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^*]).{8,20}$"  placeholder="Username" required >
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4">
            Password:-<input class="form-control" type="password" name="Password" oninvalid="password(this);" oninput="password(this);" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^*]).{8,20}$"  placeholder="Password" required>
          </div>
       </div>
    </div>
  </div>
  <div align="center" style="margin-top: 30px;"><input type="submit" class="btn btn-warning"  name="Faculty" value="Register" ></div>
  </form>

</body>
<script type="text/javascript">
function empnum(obj){
  if(obj.validity.valueMissing){
    obj.setCustomValidity('EmpCode Number Required');
  }
  else if(obj.validity.patternMismatch) {
    obj.setCustomValidity('Enter Correct EMPCODE Number(eg.F123456789)');
  }
  else if(obj.validity.tooShort) {
    obj.setCustomValidity('Enter Correct EMPCODE Number(eg.F123456789)');
  }
  else {
    var a=obj.value;
    $.ajax({
    url:'selectphp.php',
    type: 'post',
    data: {ajax: 1,selectemp:a},
    success: function(data){
    var patt = /success/i;
    if(data.match(patt))
    {
      obj.setCustomValidity('You Are Already Registered');
    }
    else{
        obj.setCustomValidity('');
       }
    }
    });
  }
}
function character(obj){
  if(obj.validity.valueMissing){
    obj.setCustomValidity('Name Is Required');
  }
  else if(obj.validity.patternMismatch) {
    obj.setCustomValidity('Only Chatachter Allow');
  }
  else {
    obj.setCustomValidity('');
  }
}
function number(obj){
  if(obj.validity.valueMissing){
    obj.setCustomValidity('Field Is Required');
  }
  else if(obj.validity.patternMismatch) {
    obj.setCustomValidity('Only Digit Allow which start with[9,8,7,6]');
  }
  else {
    obj.setCustomValidity('');
  }
}
function mail(obj){

  if(obj.validity.valueMissing){
    obj.setCustomValidity('Mailid Is Required');
  }
  else if(obj.validity.typeMismatch) {
    obj.setCustomValidity('Enter Vaild Mail Address	');
  }
  else {
    obj.setCustomValidity('');
  }
}
function dob(obj){
  if(obj.validity.valueMissing){
    obj.setCustomValidity('DateOfBirth Is Required');
  }
  else if(obj.validity.rangeOverflow) {
    obj.setCustomValidity('Not allow ');
  }
  else {
    obj.setCustomValidity('');
  }
}
function file(obj){
  var allowedExtensions = /(\.JPG|\.jpeg|\.png)$/i;
  if(obj.validity.valueMissing){
    obj.setCustomValidity('Image Is Required');
  }
  else if(!allowedExtensions.exec(obj.value)) {
    obj.setCustomValidity('Only .jpg,.png,.jpeg file Allow');
  }
  else if(obj.files[0].size/1024 > '2048'){
	  obj.setCustomValidity('*Maximum file size 2 MB, This file size is larger than 2 MB');
  }
  else {
    obj.setCustomValidity('');
  }
}
function Username(obj){
  if(obj.validity.valueMissing){
    obj.setCustomValidity('This Field Required');
  }
  else if(obj.validity.patternMismatch) {
    obj.setCustomValidity('Username must 1 Uppercase,1 Lowercase,1 Symbol,1 Number length 8 to 20' );
  }
  else {
    var a=obj.value;
    $.ajax({
    url:'selectphp.php',
    type: 'post',
    data: {ajax: 1,selectfuser:a},
    success: function(data){
      var patt = /success/i;
    if(data.match(patt))
    {
      obj.setCustomValidity('Username already Taken');
    }
    else if(data=='error') {
        obj.setCustomValidity('');
       }
    }
    });
  }
}
function Password(obj){
  if(obj.validity.valueMissing){
    obj.setCustomValidity('This Field Required');
  }
  else if(obj.validity.patternMismatch) {
    obj.setCustomValidity('Password must 1 Uppercase,1 Lowercase,1 Symbol,1 Number length 8 to 20' );
  }
  else {
        obj.setCustomValidity('');
  }
}
</script>
</html>
