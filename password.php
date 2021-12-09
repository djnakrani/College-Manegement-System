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
<center>
  <form name="password" action="updatephp.php" method="post" onsubmit="return match();">
    <table>
          <tr>
          <td>Enter Old Password:-</td><td>&nbsp;&nbsp;</td><td><input class="form-control" type="password" id="oldpassword" name="oldpassword" placeholder="Old password"></td></tr>
          <tr>
          <td>Enter New Password:-</td><td>&nbsp;&nbsp;</td><td><input class="form-control" type="password" id="newpassword" name="newpassword" pattern="(?=.*\d)(?=.*[@,#,$])(?=.*[a-z])(?=.*[A-Z]).{8,20}" minlength="8" maxlength="20" title="*Contain minimum 1 lower,1 upper,1 number,'@,#,$' symbol and also 8 to 20 charachter"  placeholder="New password" required></td></tr>
          <tr>
          <td>Conform Password:-</td><td>&nbsp;&nbsp;</td><td><input class="form-control" type="password" id="confrompassword" name="confrompassword" placeholder="Conform password"></td></tr>
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
    echo '<tr><td><input type="hidden" name="id" value="'.$id.'"></td>';
    echo '<tr><td><input type="hidden" id="password" name="password" value="'.$data['Password'].'"></td>';
    echo '<td><input class="btn btn-warning" type="submit" name="passwordadmin" value="Update"> </td></tr>';
	}
	else if($type=='f')
	{
	 	  $log="select * from faculty where FacID='$id'";
	    $res=mysql_query($log);
	    $data=mysql_fetch_assoc($res);
      echo '<tr><td><input type="hidden" name="id" value="'.$id.'"></td>';
      echo '<tr><td><input type="hidden" id="password" name="password" value="'.$data['Password'].'"></td>';
      echo '<td><input class="btn btn-warning" type="submit" name="passwordfaculty" value="Update"> </td></tr>';
	}
  else if($type=='s')
	{
	 	  $log="select * from student where StudId='$id'";
	    $res=mysql_query($log);
	    $data=mysql_fetch_assoc($res);
      echo '<tr><td><input type="hidden" name="id" value="'.$id.'"></td>';
      echo '<tr><td><input type="hidden" id="password" name="password" value="'.$data['Password'].'"></td>';
      echo '<td><input class="btn btn-warning" type="submit" name="passwordstudent" value="Update"> </td></tr>';
	}
}
?>
</table>
</form>
</center>
</body>
<script type="text/javascript">
function match()
{
  var password=document.getElementById('password').value;
  var oldpassword=document.getElementById('oldpassword').value;
  var newpassword=document.getElementById('newpassword').value;
  var confrompassword=document.getElementById('confrompassword').value;
  if(password==oldpassword)
  {
    if(newpassword==confrompassword)
    {
      return true;
    }
    else {
      swal("New Password and ConfromPassword Not Match..","Error","warning");
      return false;
    }
  }
  else {
    swal("Old Password Not Match..","Error","warning");
    return false;
  }
}

</script>

</script>
</html>
