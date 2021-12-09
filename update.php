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
<form name="admin" action="updatephp.php" method="post">
	<table>
		<tbody>
			<tr>
			<td>FullName:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Fullname"]; ?></td></tr>
			<tr>
			<td>Date Of Birth:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Dob"]; ?> </td></tr>
			<tr>
			<td>Address:-</td><td>&nbsp;&nbsp;</td><td><input type="text" class="form-control" name="Address" value="<?php echo $data["Address"]; ?>" required></td></tr>
			<tr>
			<td>Mobile Number:-</td><td>&nbsp;&nbsp;</td><td><input type="text" class="form-control" pattern="[9,8,7,6][0-9]+" name="Mobileno" minlength="10" maxlength="10" value="<?php echo $data["Mobileno"]; ?>" required></td></tr>
			<tr>
			<td>Email Id:-</td><td>&nbsp;&nbsp;</td><td><input type="email" class="form-control" name="Mailid" value="<?php echo $data["Mailid"]; ?>" required></td></tr>
			<tr>
			<td>Gender:-</td><td>&nbsp;&nbsp;</td><td><?php echo $gender; ?></td></tr>
			<tr>
			<td><input type="hidden" name="id" value="<?php echo $id; ?>"></td><td>&nbsp;&nbsp;</td>
      <td><input type="submit" name="adminupdate" value="Update" class="btn btn-info"></td></tr>
		</tbody>
	</table>
</form>
</center>
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
<form name="faculty" action="updatephp.php" method="post">
		<table>
          <tr>
          <td>EmpCode:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["EmpCode"]; ?></td></tr>
					<tr>
					<td>FullName:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Fullname"]; ?></td></tr>
					<tr>
					<td>Date Of Birth:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Dob"]; ?> </td></tr>
					<tr>
					<td>Gender:-</td><td>&nbsp;&nbsp;</td><td><?php echo $gender; ?> </td></tr>
					<tr>
					<td>Date Of Joining:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["DateOfJoin"]; ?> </td></tr>
          <tr>
					<td>Address:-</td><td>&nbsp;&nbsp;</td><td><input type="text" class="form-control" name="Address" value="<?php echo $data["Address"]; ?>" required></td></tr>
          <tr>
					<td>Mobile Number:-</td><td>&nbsp;&nbsp;</td><td><input type="text" class="form-control" pattern="[9,8,7,6][0-9]+" name="Mobileno" minlength="10" maxlength="10" value="<?php echo $data["Mobileno"]; ?>"></td></tr>
          <tr>
					<td>Email Id:-</td><td>&nbsp;&nbsp;</td><td><input type="email" class="form-control" name="Mailid" value="<?php echo $data["Mailid"]; ?>"></td></tr>
          <tr>
					<td>Qualification:-</td><td>&nbsp;&nbsp;</td><td><input type="text" class="form-control" name="Qualification" value="<?php echo $data["Qualification"]; ?>" required></td></tr>
          <tr>
					<td>Experiance:-</td><td>&nbsp;&nbsp;</td><td><input type="text" class="form-control" name="Experiance" value="<?php echo $data["Experiance"]; ?>" pattern="[0-9]+" required></td></tr>
          <tr>
					<td><input type="hidden" name="id" value="<?php echo $id; ?>"></td><td>&nbsp;&nbsp;</td>
          <td><input type="submit" name="facultyupdate" value="Update" class="btn btn-info"></td></tr>
    </table>
</form>
</center>
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
<form name="student" action="updatephp.php" method="post">
	 <table>
					<tr>
					<td>FullName:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Firstname"]."&nbsp;".$data["Middlename"]."&nbsp;".$data["Lastname"];?></td></tr>
          <tr>
					<td>Enrollment No:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["EnrollMent"]; ?> </td></tr>
          <tr>
					<td>Date Of Birth:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data["Dob"]; ?> </td></tr>
					<tr>
					<td>Gender:-</td><td>&nbsp;&nbsp;</td><td><?php echo $gender; ?> </td></tr>
					<tr>
					<td>Year Of Admission:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["YearOfAdd"]; ?> </td></tr>
					<tr>
					<td>Course:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data["Course"]; ?> </td></tr>
          <tr>
					<td>Address:- </td><td>&nbsp;&nbsp;</td><td><input type="text" name="Address" value="<?php echo $data["Address"]; ?>" required></td></tr>
          <tr>
					<td>Mobile Number:- </td><td>&nbsp;&nbsp;</td><td><input type="text" pattern="[9,8,7,6][0-9]+" name="Mobileno" maxlength="10" minlength="10" value="<?php echo $data["Mobileno"]; ?>" required></td></tr>
          <tr>
					<td>Email Id:- </td><td>&nbsp;&nbsp;</td><td><input type="email" name="Mailid" value="<?php echo $data["Mailid"]; ?>" required></td></tr>
          <tr>
					<td>Semester:- </td><td>&nbsp;&nbsp;</td><td><select name="SemId" required><option value="">....Select.... </option>
                      <?php
                      $find="select * from degree where DegName='$data[Course]'";
                      $fres=mysql_query($find);
                      $fdata=mysql_fetch_assoc($fres);
                      $sqry2="select * from semester where DegId='$fdata[DegId]'";
                      $res2=mysql_query($sqry2);
                      while($data2=mysql_fetch_assoc($res2))
                      {
                          echo "<option value='$data2[SemId]'>$data2[SemName]</option>";
                      }
                      ?>
                      </select>
          </select></td></tr>
          <tr>
					<td><input type="hidden" name="id" value="<?php echo $id; ?>"></td><td>&nbsp;&nbsp;</td>
          <td><input type="submit" name="studentupdate" value="Update" class="btn btn-info"></td></tr>
  </table>
</form>
  </center>
<?php
	}
}
?>

</body>
</html>
