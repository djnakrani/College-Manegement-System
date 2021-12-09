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
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert.css">
    <!-- custom Css -->
    <link rel="stylesheet" href="css/backend.css">
</head>
<body>
<?php
include_once("connection.php");
if(isset($_REQUEST["id"]))
{
  $id=$_REQUEST["id"];
  $type=$_REQUEST["type"];
  if($type=='a')
  {
	  $log="select * from admin where AdminId='$id'";
	  $res=mysql_query($log);
	  $data=mysql_fetch_assoc($res);
	  $gender=$data["Gender"];
	  if($gender=="M")
	  { $gender="Male";}
	  else
	  { $gender="Female";}

?>
<center>
<table class="data-show">
      <tr align="center"><th colspan="3"  ><img src="Image/<?php echo $data["Image"]; ?>" class="image-circle"></th></tr>
      <tr>
      <td>FullName:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Fullname"]; ?></td></tr>
      <tr>
      <td>Date Of Birth:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Dob"]; ?> </td></tr>
      <tr>
      <td>Address:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data["Address"]; ?></td></tr>
      <tr>
      <td>Mobile Number:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data["Mobileno"]; ?> </td></tr>
      <tr>
      <td>Email Id:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["Mailid"]; ?> </td></tr>
      <tr>
      <td>Gender:-</td><td>&nbsp;&nbsp;</td><td><?php echo $gender; ?>  </td></tr>
</table></center>
<?php
	}
	else if($_REQUEST["type"]=='f')
	{
	 	$log="select * from faculty where FacID='$id'";
	    $res=mysql_query($log);
	    $data=mysql_fetch_assoc($res);
	    $gender=$data["Gender"];
		if($gender=="M")
		{ $gender="Male";}
		else
		{ $gender="Female";}

?>
<center>
<table class="data-show">
      <tr align="center"><th colspan="3"  ><img src="Image/Faculty/<?php echo $data["Image"]; ?>" class="image-circle"></th></tr>
      <tr>
			<td>EmpCode:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["EmpCode"]; ?> </td></tr>
			<tr>
			<td>FullName:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Fullname"]; ?></td></tr>
			<tr>
			<td>Date Of Birth:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Dob"]; ?> </td></tr>
			<tr>
			<td>E-Mail:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["Mailid"]; ?> </td></tr>
			<tr>
			<td>Address:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data["Address"]; ?></td></tr>
			<tr>
			<td>Mobile Number:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data["Mobileno"]; ?> </td></tr>
			<tr>
			<td>Gender:-</td><td>&nbsp;&nbsp;</td><td><?php echo $gender; ?> </td></tr>
			<tr>
			<td>Date Of Joining:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["DateOfJoin"]; ?> </td></tr>
			<tr>
			<td>Qualification:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["Qualification"]; ?> </td></tr>
			<tr>
			<td>Experiance:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["Experiance"]; ?> </td>
		</tr>
</table></center>
<?php
	}
	else if($_REQUEST["type"]=='s')
	{
		$log="select * from student where StudId='$id'";
    $res=mysql_query($log);
    $data=mysql_fetch_assoc($res);
	  $gender=$data["Gender"];
		if($gender=="M")
		{ $gender="Male";}
		else
		{ $gender="Female";}

?>
<center>
<table class="data-show">
      <tr align="center"><th colspan="3"  ><img src="Image/Student/<?php echo $data["Image"]; ?>" class="image-circle"></th></tr>
    	<tr>
			<td>FullName:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Firstname"]."&nbsp;".$data["Middlename"]."&nbsp;".$data["Lastname"]; ?></td></tr>
			<tr>
			<td>EnrollMent No:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["EnrollMent"]; ?> </td></tr>
      <tr>
			<td>Date Of Birth:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Dob"]; ?> </td></tr>
			<tr>
			<td>E-Mail:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["Mailid"]; ?> </td></tr>
			<tr>
			<td>Address:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data["Address"]; ?></td></tr>
			<tr>
			<td>Mobile Number:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data["Mobileno"]; ?> </td></tr>
			<tr>
			<td>Gender:-</td><td>&nbsp;&nbsp;</td><td><?php echo $gender; ?> </td></tr>
			<tr>
			<td>Year Of Admission:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["YearOfAdd"]; ?> </td></tr>
			<tr>
			<td>Semester:- </td><td>&nbsp;&nbsp;</td><td><?php
 			$sqry4="select * from semester where SemId='$data[SemId]'";
            $res2=mysql_query($sqry4);
            while($data2=mysql_fetch_assoc($res2))
            {
            	echo $data2["SemName"];
            }?></td></tr>
			<tr>
			<td>Course:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["Course"]; ?> </td>
			</tr>
</table></center>
<?php
	}


}
?>

</body>
</html>
