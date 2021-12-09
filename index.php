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
<body>
<?php include_once("connection.php"); ?>
	<div class="body1">
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
		<!-- First Greet -->
		<div class="container text-center headerset">
			<h1>Welcome</h1>
			<h3><b><i>SHREE SARDAR PATEL COLLEGE OF INSTITUTE</i></b></h3>
			<div class="row">
				<div class="col-lg-12 col-sm-2 ">
				<a href="#" class="btn btn-large btn-warning ">Home</a>
				<a href="#home1" class="btn btn-large btn-warning">Service</a>
				<a href="#home2" class="btn btn-large btn-warning">Interaction</a>
				<a href="#home3" class="btn btn-large btn-warning">Information</a>
				<a href="#home4" class="btn btn-large btn-warning">About</a>
				</div>
			</div>
		</div>
	</div>

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
<div id="content"></div>
	<!-- HOME 1 -->
	<div class="container home1 text-center" id="home1">
		<h1>Service</h1>
		<p>Wikipedia is a free online encyclopedia, created and edited by volunteers around the world and hosted by the Wikimedia Foundation.</p>
		<div class="row rowservice">
			<div class="col-md-4 col-sm-12">
				<i class="fas fa-school fa-3x" ></i>
				<h1>Architecture</h1>
				<p>Architecture is both the process and the product of planning, designing, and constructing buildings or any other structures.</p>
			</div>
			<div class="col-md-4 col-sm-12">
				<i class="fas fa-chalkboard-teacher fa-3x" ></i>
				<h1>Faculties</h1>
				<p>The Faculty of Arts was one of the four traditional divisions of the teaching bodies of medieval universities. </p>
			</div>
			<div class="col-md-4 col-sm-12">
				<i class="fas fa-book-reader fa-3x" ></i>
				<h1>Students</h1>
				<p>A student is a person who learning something.</p>
			</div>
		</div>
	</div>

	<!-- HOME 2 -->
<?php
include_once("connection.php");
$qry="select count(*) from student";
$res=mysql_query($qry);
$data=mysql_fetch_row($res);
$qry1="select count(*) from faculty";
$res1=mysql_query($qry1);
$data1=mysql_fetch_row($res1);
 ?>
	<div class="container home2 text-center counter-saction" id="home2">
		<h1>Our Interaction</h1>
		<div class="row rowservice">
			<div class="col-md-6 col-sm-12">
				<span class="counter counter-size"><?php echo $data1[0];  ?></span><span class="counter-size">+</span>
				<p>Faculties</p>
			</div>
			<div class="col-md-6 col-sm-12">
				<span class="counter counter-size"><?php echo $data[0];  ?></span><span class="counter-size">+</span>
				<p>Students</p>
			</div>
		</div>
	</div>

	<!-- HOME 3 -->
	<div class="container home3 text-center" id="home3">
		<div class="row">
			<div class="col-md-12 col-sm-12 text-justify info">
				<h1 class="text-center"> Information <h1>
				<p>India's higher education system is the third largest in the world, next to the United States and China. The main governing body at the tertiary level is the University Grants Commission, which enforces its standards, advises the government, and helps coordinate between the centre and the state.Accreditation for higher learning is overseen by 15 autonomous institutions established by the University Grants Commission (UGC).</p>

				<p>As per the latest 2011 Census, about 8.15% (68 million) of Indians are graduates, with Union Territories of Chandigarh and Delhi topping the list with 24.65% and 22.56% of their population being graduates respectively. Indian higher education system has expanded at a fast pace by adding nearly 20,000 colleges and more than 8 million students in a decade from 2000–01 to 2010–11.As of 2016, India has 799 universities, with a break up of 50 central universities, 402 state universities, 124 deemed universities, 334 private universities, 5 institutions established and functioning under the State Act, and 75 Institutes of National Importance which include IIMs, AIIMS, IITs, IIEST and NITs among others.Other institutions include 39,071 colleges as Government Degree Colleges and Private Degree Colleges, including 1800 exclusive women's colleges, functioning under these universities and institutions as reported by the UGC in 2016.Colleges may be Autonomous, i.e. empowered to examine their own degrees, up to PhD level in some cases, or non-autonomous, in which case their examinations are under the supervision of the university to which they are affiliated; in either case, however, degrees are awarded in the name of the university rather than the college.</p>

				<p>The emphasis in the tertiary level of education lies on science and technology. Indian educational institutions by 2004 consisted of many technology institutes. Distance learning and open education is also a feature of the Indian higher education system, and is looked after by the Distance Education Council. Indira Gandhi National Open University (IGNOU) is the largest university in the world by number of students, having approximately 3.5 million students across the globe.</p>

				<p>Some institutions of India, such as the Indian Institutes of Technology (IITs), Indian Institute of Engineering Science and Technology (IIEST), National Institutes of Technology (NITs), Indian Institute of Science, Indian Institute of Science Education and Research[17](IISERs), University of Delhi (DU), Indian Institutes of Management (IIMs), University of Calcutta (1857), University of Madras (1857), University of Mumbai (1857) and Jawaharlal Nehru University (1969), have been globally acclaimed for their standard of education.The IITs enroll about 8000 students annually and the alumni have contributed to both the growth of the private sector and the public sectors of India. However, Indian universities still lag behind universities such as Harvard, Cambridge, and Oxford.</p>

			</div>
		</div>
	</div>

	<!-- HOME 4 -->
	<div class="container-fluid home4 bg-dark text-white" id="home4">
		<div class="row">
			<div class="col-md-3 col-sm-12 text-center">
				<h1>College</h1>
				<p>To be a premier University of Integral and Transformational Learning for future leaders.</p>
			</div>
			<div class="col-md-3 col-sm-12  text-center">

				<h1>For Admission</h1>
				<p><i class="fa fa-phone">&nbsp;(0261)2759657</i></p>
				<p><i class="fa fa-mobile">&nbsp;+919067127486</i></p>
				<p><i class="fa fa-mobile">&nbsp;Toll Free 1800 262 2158</i></p>
				<p><i class="fa fa-envelope">&nbsp;education@best.com</i></p>
			</div>
			<div class="col-md-3 col-sm-12 text-center">
				<h1>Contact Us</h1>
				<p><i class="fa fa-mobile">&nbsp;(0261)2758400</i></p>
				<p><i class="fa fa-chrome">&nbsp;www.college.edu</i></p>
			</div>
			<div class="col-md-3 col-sm-12 text-center">
				<h2><a target="_blank" href="https://www.facebook.com"><i class="fab fa-facebook"></i></a></h2>
				<h2><a target="_blank" href="https://twitter.com/login"><i class="fab fa-twitter-square"></i></a></h2>
				<h2><a target="_blank" href="https://in.linkedin.com"><i class="fab fab fa-invision"></i></a></h2>
				<h2><a target="_blank" href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></h2>
			</div>
		</div>
	</div>

	<!-- copyright --
	<div class="container-fluid cpr8 bg-secondary text-center">
		<p>@ Copyright For the National Group</p>
	</div>-->
</div>	<!-- BACK TO TOP -->
	<a id="back2Top" class="back" title="Back to top" href="#">&#10148;</a>
</body>
<script>
var urlParams = new URLSearchParams(location.search);
var id=urlParams.get('id');
var msg=urlParams.get('msg');
if(msg=="err")
{
  swal("Sorry", "Wrong Username Or Password", "error");
}
else if(msg=="regsuccess") {
  swal("SuccessFully","Registration Success","success");

}
	//counter
	$(document).ready(function() {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
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

function download(){
  $('#content').load("Download.php");
}
</script>

	</html>
