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
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/popup.css">

  <!-- CUSTOM JS  -->
  <script src="js/style.js"></script>

</head>
<body onload="download();">
	<div>
	<!-- Navigation Bar -->
		<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
			<div class="container">
				<a href="" class="navbar-brand text-warning font-weight-bold"><img src="css/banner/logo1.png" width="50px" height="50px"/></a>
				<button class="navbar-toggler" data-toggle="collapse" data-target="#collapsenav"><span class="navbar-toggler-icon"></span></button>

			</div>
			<div class="container">
				<div class="collapse navbar-collapse text-right" id="collapsenav">
					<ul class="navbar-nav ml-auto">
            &ensp;&ensp;<li class="nav-item dropdown"><a class="nav-link" href="index.php" >Home</a></li>
						&ensp;&ensp;<li class="nav-item dropdown"><a class="nav-link" href="main-download.php" >Download</a></li>
						&ensp;&ensp;<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Courses
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <?php
          include_once("connection.php");
          $sqry="select * from degree";
          $res=mysql_query($sqry);
          while($data=mysql_fetch_assoc($res))
          {
            echo "<a  class='dropdown-item link' href='main-course.php?id=$data[DegId]'>$data[DegName]</a>";
          }
          ?>
        </div>
        </li>
						&ensp;&ensp;<li class="nav-item dropdown"><a class="nav-link" href="Gallary.php" >Gallery</a></li>
						&ensp;&ensp;<li class="nav-item dropdown"><a class="nav-link" href="Contact.php" >Contact Us</a></li>
						&ensp;&ensp;<li class="navbar-icon"><button class="btn btn-info" data-target="#mymodal" data-toggle="modal"><i class="fas fa-lock">&nbsp;Login</i></button></li>
					</ul>
				</div>
			</div>
		</nav>


	<!-- login Popup --->
		<div class="modal fade" id="mymodal">
			<div class="modal-dialog" style="margin-top:10%; ">
				<div class="modal-content">
					<div class="modal-header img">
						<div><i class="fas fa-user fa-4x"></i></div>
						<button class="close" data-dismiss="modal">  &times;</button>
					</div>
					<div class="modal-body form">
						<form name="signin" action="login.php" method="post">
							<div class="radcs">
								<input type="radio" name="ty" id="f" class="btn-info" value="f"><label class="lbl1" for="f">Faculty</label>
								<input type="radio" name="ty" id="s" class="btn-info" value="s" checked><label class="lbl2" for="s">Student</label>
							</div>
							<h4><i class="fas fa-user-shield"></i></h4>
							<input type="text" name="username" placeholder="Enter Username">
							<h4><i class="fas fa-fingerprint"></i></h4>
							<input type="password" name="password" placeholder="Enter Password">
							<div align="center"><input type="submit" class="btn btn-danger" name="signin" value="Sign in"></div>
						</form>
					</div>
					<div class="modal-footer justify-content-center">
						<h6 align="center">Forgot & Create Account?<a href="registration.php">Click This</a></h6>
					</div>
				</div>
			</div>
		</div>
    <center>
<div id="content" style="margin-top:7%; width:99%;">
  <div align="center" class="divcontent">
    <img src="css/banner/logo1.png" height="100" width="100">
    <p> <b>Address:-</b> LIMDA CHOWK, JALALPORE ROAD,NAVSARI</p>
    <p> GUJARAT-396421 </p>
    <p> <b>MOBILE:-</b> (0261)2574869 , +919099259576 , +91 7623801906</p>
    <p> <b>EMAIL:- </b>svp.college@study.com</p>
  </div>
</div>
</center>
	<!-- BACK TO TOP -->
	<a id="back2Top" class="back" title="Back to top" href="#">&#10148;</a>
</body>
<script type="text/javascript">

    //back to top
    $(window).scroll(function() {
	    var height = $(window).scrollTop();
	    if (height > 100) {
	        $('#back2Top').fadeIn();
	    } else {
	        $('#back2Top').fadeOut();
	    }
	});
	$(document).ready(function() {
	    $("#back2Top").click(function(event) {
	        event.preventDefault();
	        $("html, body").animate({ scrollTop: 0 }, "slow");
	        return false;
	    });
	});

</script>

	</html>
