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
	<script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert.css">
  <!-- CUSTOM CSS -->
  <link rel="stylesheet" href="css/registration.css">

  <!-- CUSTOM JS  -->
  <script src="js/validation.js"></script>
  <script src="js/validation-2.js"></script>

</head>
<body onload="replace()">
      <div>
          <button class="btn btn-outline-dark link-main select" id='student' onclick="replace('Student')"><i class="fas fa-lock fa-3x">&nbsp; Student</i></button>
          <button class="btn btn-outline-dark link-main select" id='faculty' onclick="replace('Faculty')"><i class="fas fa-lock fa-3x ">&nbsp;Faculty</i></button>
          <button class="btn btn-outline-dark link-main select" id='forgot' onclick="replace('forgot')"><i class="fas fa-lock fa-3x">&nbsp; Forgot Password</i></button>
      </div>
      <div align="right"><a href="index.php" class="btn btn-primary">Home</a></div>
      <div id='contentpage'>

      </div>

</body>
<script type="text/javascript">
var urlParams = new URLSearchParams(location.search);
var forgot=urlParams.get('forgot');
if(forgot==1)
{
  replace('forgot');
}
function replace(location){
  if(location=='forgot')
  {
    $('#student').removeClass('active');
    $('#faculty').removeClass('active');
    $('#forgot').addClass('active');
    $('#contentpage').load("Forget-Password.php");
  }
  else if(location=='Faculty')
  {
    $('#student').removeClass('active');
    $('#forgot').removeClass('active');
    $('#faculty').addClass('active');
    $('#contentpage').load("Faculty-registration.php");
  }
  else {
    $('#forgot').removeClass('active');
    $('#faculty').removeClass('active');
    $('#student').addClass('active');
    $('#contentpage').load("Student-registration.php");
  }
}
</script>
</html>
