<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>

<body>

<?php
include_once("connection.php");
if(isset($_REQUEST["exportfac"]))
{
 $output = '';
 $query = "SELECT * FROM faculty";
 $result = mysql_query($query);
 if(mysql_num_rows($result) > 0)
 {
  $output .= '
   <table bordered="1">
   <tr bgcolor="#33001a" style="color:#ffffff">
      <th>NO</th>
      <th>EMPLOYEE CODE</th>
      <th>EMP NAME</th>
      <th>EMAIL</th>
      <th>MOBILE</th>
      <th>DATE OF BIRTH</th>
      <th>ADDRESS</th>
      <th>GENDER</th>
      <th>DATE OF JONING</th>
      <th>QUALIFICATION</th>
      <th>EXPERIANCE</th></tr>';
  while($row = mysql_fetch_assoc($result))
  {
   $output .= '
    <tr>
      <td>'.$row["FacID"].'</td>
      <td>'.$row["EmpCode"].'</td>
			<td>'.$row["Fullname"].'</td>
			<td>'.$row["Mailid"].'</td>
			<td>'.$row["Mobileno"].'</td>
			<td>'.$row["Dob"].'</td>
			<td>'.$row["Address"].'</td>
			<td>'.$row["Gender"].'</td>
			<td>'.$row["DateOfJoin"].'</td>
      <td>'.$row["Qualification"].'</td>
      <td>'.$row["Experiance"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=faculty.xls');
  echo $output;
 }
}



if(isset($_REQUEST["exportstud"]))
{
 $output = "";
 $query = 'SELECT * FROM student';
 $result = mysql_query($query);
 if(mysql_num_rows($result) > 0)
 {
  $output .= '
   <table class="searchtable" border="1">
                    <tr bgcolor="#33001a" style="color:#ffffff">
						 <th>STUDID</th>
             <th>ENROLLMENT</th>
						 <th>FIRSTNAME</th>
						 <th>MIDDLENAME</th>
						 <th>LASTNAME</th>
						 <th>EMAIL</th>
						 <th>MOBILE</th>
						 <th>ADDRESS</th>
						 <th>SEMESTER</th>
						 <th>DATE OF BIRTH</th>
						 <th>GENDER</th>
						 <th>COURSE</th>
						 <th>ADMISSION YEAR</th>
                    </tr>
  ';
  while($row = mysql_fetch_array($result))
  {
	  $qu="select * from semester where SemId=".$row['SemId'];
	  $res=mysql_query($qu);
	  $data=mysql_fetch_assoc($res);
   $output .= '
    <tr>

        <td>'.$row["StudId"].'</td>
        <td>'.$row["EnrollMent"].'</td>
        <td>'.$row["Firstname"].'</td>
        <td>'.$row["Middlename"].'</td>
        <td>'.$row["Lastname"].'</td>
        <td>'.$row["Mailid"].'</td>
        <td>'.$row["Mobileno"].'</td>
        <td>'.$row["Address"].'</td>
        <td>'.$data["SemName"].'</td>
        <td>'.$row["Dob"].'</td>
        <td>'.$row["Gender"].'</td>
        <td>'.$row["Course"].'</td>
        <td>'.$row["YearOfAdd"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Student.xls');
  echo $output;
 }
}

if(isset($_REQUEST["exportatt"]))
{
 $output = '';
 $query = "select StudId,extract(month from date) as month,extract(year from date) as year,count(*) as total,sum(attvalue) as present from attandance group by month,year,studid";
 $result = mysql_query($query);
 if(mysql_num_rows($result) > 0)
 {
  $output .= '
   <table class="searchtable" border="1">
                    <tr bgcolor="#33001a" style="color:#ffffff">
						 <th>StudId</th>
						 <th>Student Name</th>
             <th>Degree</th>
						 <th>SEMESTER</th>
						 <th>MONTH</th>
						 <th>YEAR</th>
						 <th>PRESENT DAY</th>
						 <th>TOTAL DAY</th>

                    </tr>
  ';
  while($row = mysql_fetch_assoc($result))
  {
    $qu="select * from student where StudId=".$row['StudId'];
	  $res=mysql_query($qu);
	  $data=mysql_fetch_assoc($res);
    $qu2="select * from semester where SemId=".$data['SemId'];
	  $res2=mysql_query($qu2);
	  $data2=mysql_fetch_assoc($res2);
   $output .= '
    <tr>

        <td>'.$row["StudId"].'</td>
        <td>'.$data['Firstname']."&nbsp;".$data['Middlename']."&nbsp;".$data['Lastname']."&nbsp;".'</td>
        <td>'.$data["Course"].'</td>
        <td>'.$data2["SemName"].'</td>
        <td>'.date("F", mktime(0, 0, 0, $row['month'], 10)).'</td>
        <td>'.$row["year"].'</td>
        <td>'.$row["present"].'</td>
        <td>'.$row["total"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Attandance.xls');
  echo $output;
 }
}



if(isset($_REQUEST["exportpay"]))
{
 $output = '';
 $query = "select * from payment";
 $result = mysql_query($query);
 if(mysql_num_rows($result) > 0)
 {
  $output .= '
   <table class="searchtable" border="1">
                    <tr bgcolor="#33001a" style="color:#ffffff">
						 <th>StudId</th>
						 <th>Student Name</th>
             <th>Degree</th>
						 <th>Semester</th>
						 <th>Date</th>
						 <th>Order Id</th>
                    </tr>
  ';
  while($row = mysql_fetch_assoc($result))
  {
	  $qu="select * from student where StudId=".$row['StudId'];
	  $res=mysql_query($qu);
	  $data=mysql_fetch_assoc($res);
	  $qu2="select * from semester where SemId=".$row['SemId'];
	  $res2=mysql_query($qu2);
	  $data2=mysql_fetch_assoc($res2);
   $output .= '
    <tr>

        <td>'.$row["StudId"].'</td>
        <td>'.$data["Firstname"].'&nbsp;'.$data["Middlename"].'&nbsp;'.$data["Lastname"].'</td>
        <td>'.$data["Course"].'</td>
        <td>'.$data2["SemName"].'</td>
        <td>'.$row["Date"].'</td>
        <td>'.$row["paymentid"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Payment.xls');
  echo $output;
 }
}


if(isset($_REQUEST["exportres"]))
{
 $output = '';
 $query = "select * from result";
 $result = mysql_query($query);
 if(mysql_num_rows($result) > 0)
 {
  $output .= '
   <table class="searchtable" border="1">
                    <tr bgcolor="#33001a" style="color:#ffffff">
						 <th>STUDID</th>
						 <th>FULLNAME</th>
             <th>Degree</th>
						 <th>SEMESTER</th>
						 <th>SUB1</th>
						 <th>SUB2</th>
						 <th>SUB3</th>
						 <th>SUB4</th>
						 <th>SUB5</th>
						 <th>SUB6</th>
						 <th>SUB7</th>
						 <th>SUB8</th>
						 <th>SUB9</th>
						 <th>SUB10</th>
						 <th>Total</th>
						 <th>AVG</th>
                    </tr>
  ';
  while($row = mysql_fetch_array($result))
  {
	  $qu="select * from student where StudId=".$row['StudId'];
	  $res=mysql_query($qu);
	  $data=mysql_fetch_assoc($res);
	  $qu2="select * from semester where SemId=".$row['SemId'];
	  $res2=mysql_query($qu2);
	  $data2=mysql_fetch_assoc($res2);
   $output .= '
    <tr>

        <td>'.$row["StudId"].'</td>
        <td>'.$data["Firstname"].'&nbsp;'.$data["Middlename"].'&nbsp;'.$data["Lastname"].'</td>
        <td>'.$data["Course"].'</td>
		      <td>'.$data2["SemName"].'</td>
        <td>'.$row["Sub1"].'</td>
        <td>'.$row["Sub2"].'</td>
        <td>'.$row["Sub3"].'</td>
        <td>'.$row["Sub4"].'</td>
        <td>'.$row["Sub5"].'</td>
        <td>'.$row["Sub6"].'</td>
        <td>'.$row["Sub7"].'</td>
        <td>'.$row["Sub8"].'</td>
        <td>'.$row["Sub9"].'</td>
        <td>'.$row["Sub10"].'</td>
		<td>'.$row["ResTotal"].'</td>
        <td>'.$row["ResAvg"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Result.xls');
  echo $output;
 }
}

?>
</body>
</html>
