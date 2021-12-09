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

</head>
<body>
<?php
  include_once("connection.php");
?>
  <h1>Forgot Password</h1>
  <div class="personal-one">
    <center><div class="head-reg"><h5>Varify Candidate Information:</h5></div>
    <div class="form-inline ">
      <div class="container margin-form">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="text"  class="form-control" id="code" placeholder="Your Personal Code" required/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="text"   class="form-control" id="email" placeholder="Your Email" required/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="button" id="update" class="btn btn-info" name="submit">submit</button>
          </div>
       </div>
    </div></center>
  </div>
  <div class="personal-one" >
    <center><div class="head-reg"><h5>Change Password:</h5></div>
      <div class="container margin-form">
        <form name="Forgot" id="form-reset" onsubmit="return match();" method="post">
        <div id="newshow">  </div>
      </form>
      </div></center>
 </div>

</body>
<script type="text/javascript">
$(document).ready(function(){
    $('#update').click(function(){
      $('#change').show();
      var code=document.getElementById('code').value;
      var email=document.getElementById('email').value;
      $.ajax({
       url:'selectphp.php',
       type: 'post',
       data: {code:code,email:email},
       success: function(data){
          $('#newshow').html(data);

        }
      });
    });
});
function match()
{
  var id=document.getElementById('id').value;
  var type=document.getElementById('type').value;
  var newpassword=document.getElementById('newpassword').value;
  var confrompassword=document.getElementById('confrompassword').value;

    if(newpassword==confrompassword)
    {
      if(type=="F")
      {
        $.ajax({
         url:'updatephp.php',
         type: 'post',
         data: {passwordfaculty:1,confrompassword:confrompassword,id:id},
         success: function(data){
           swal("SuccessFully Change Password","","success")
           setTimeout(location.replace("index.php"),2000);
         }
        });
        return false;
      }
      else{
        $.ajax({
         url:'updatephp.php',
         type: 'post',
         data: {passwordstudent:1,confrompassword:confrompassword,id:id},
         success: function(data){
           swal("SuccessFully Change Password","","success")
           location.replace("index.php");
         }
        });
        return false;
      }
    }
    else {
      swal("New Password and ConfromPassword Not Match..","Error","warning");
      return false;
    }
}

function password(obj){
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
