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
  $id=$_REQUEST["id"];
  $qry="select * from student where StudId='$id'";
  $res=mysql_query($qry);
  $data=mysql_fetch_assoc($res);

  ?>
<center>
  <table border="2">

  <tr>
  <td>FullName:-</td><td colspan="2"><?php echo $data['Firstname'].'&nbsp;'.$data['Middlename'].'&nbsp;'.$data['Lastname'] ?></td></tr>
  <?php
  $select1="select * from  degree where DegName='".$data['Course']."'";
  $res1=mysql_query($select1);
  $data1=mysql_fetch_assoc($res1);
  $select2="select * from  semester where DegId=".$data1['DegId'];
  $res2=mysql_query($select2);
  while($data2=mysql_fetch_assoc($res2))
  {
    echo "<tr><td>".$data2['SemName']."</td>";
    $qry="select * from payment where StudId=".$data['StudId']." and SemId=".$data2['SemId'];
    $res3=mysql_query($qry);
    if($data3=mysql_fetch_assoc($res3))
    {
      echo "<td align='center'>".$data3['Date']."</td>";
      echo "<td align='center'><font color='Green'>Paid</font></td>";
    }
    else
    {
      echo "<td align='center'>-</td>";
      echo "<td align='center'><font color='Red'>UnPaid</font></td>";
    }
    echo "</tr>";
  }
  ?>
  </table>
</center>
</body>
</html>
