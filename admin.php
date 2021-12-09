<!DOCTYPE HTML>
<html>
<head>
    <title>Admin | Login</title>
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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body class="body1">
	<div class="col-md-12 col-sm-12 container1" align="center">
		<div class="container">
			<div class="user_card">
				<div class="brand_logo_container">
					<i class="fas fa-user fa-white fa-5x" style="color: white;"></i>
				</div>
				<div class="greet"><h1>ADMIN</h1></div>
				<div class="form_container" align="left">
					<form name="admin" action="login.php" method="get">
						<label class="input-group-text"><i class="fas fa-user"></i></label>
						<input type="text" name="username" class="input_user" value="" placeholder="Write Username">
						<label class="input-group-text"><i class="fas fa-key"></i></label>
						<input type="password" name="password" class="input_user" value="" placeholder="Write Password">
						<div align="center">
							<input class="btn login_btn" type="submit" name="signin" value="Sign In">
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</body>
</html>
