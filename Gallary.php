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
<div id="content" style="margin-top:7%; width:99%; overflow:auto;">
  <table class="galary-table">
  <tr><td>
    <div class="con-img-gallary">
      <img src="css/banner/5.jpg" alt="Avatar" class="image-gallary">
      <div class="overlay">
       <div class="text">A Journey to Excellence.</div>
     </div>
  </div></td><td align="justify"><h1>Study</h1><p>Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits. Educational methods include teaching, training, storytelling, discussion and directed research. Education frequently takes place under the guidance of educators, however learners can also educate themselves.</p></td></tr>


  <tr><td align="justify"><h1>Sport</h1><p>Sport includes all forms of competitive physical activity or games which, through casual or organised participation, at least in part aim to use, maintain or improve physical ability and skills while providing enjoyment to participants, and in some cases, entertainment for spectators.[2] Hundreds of sports exist, from those between single contestants, through to those with hundreds of simultaneous participants, either in teams or competing as individuals.</p></td><td><div class="con-img-gallary">
      <img src="Image/Gallary/sport.jpg" height="500" width="500" alt="Avatar" class="image-gallary">
      <div class="overlay">
       <div class="text">Play like a Champion Today.</div>
     </div>
  </div></td></tr>

  <tr><td align="left"><div class="con-img-gallary">
      <img src="Image/Gallary/concept.jpg" alt="Avatar" class="image-gallary">
      <div class="overlay">
       <div class="text">You Can Do Anything...</div>
     </div>
  </div></td><td align="justify"><h1>Concepts</h1><p>Concepts are defined as abstract ideas or general notions that occur in the mind, in speech, or in thought. They are understood to be the fundamental building blocks of thoughts and beliefs. They play an important role in all aspects of cognition.As such, concepts are studied by several disciplines, such as linguistics, psychology, and philosophy, and these disciplines are interested in the logical and psychological structure of concepts, and how they are put together to form thoughts and sentences.</p></td></tr>

  <tr><td align="justify"><h1>Technology</h1><p>Information technology (IT) is the use of computers to store, retrieve, transmit, and manipulate data[1] or information. IT is typically used within the context of business operations as opposed to personal or entertainment technologies.[2] IT is considered to be a subset of information and communications technology (ICT).</p></td><td align="right"><div class="con-img-gallary">
      <img src="Image/Gallary/techno.jpg" alt="Avatar" class="image-gallary">
      <div class="overlay">
       <div class="text">Make Potential Possible</div>
     </div>
  </div></td></tr>
  </table>

</div>
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
