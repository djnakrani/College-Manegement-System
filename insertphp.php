<?php
include_once('connection.php');
if( isset($_REQUEST['ajax']) && isset($_REQUEST['insertcourse']) )
{
  $course=$_REQUEST['insertcourse'];
  $year=$_REQUEST['year'];
  $insert="insert into degree(DegName,Year) values ('$course',$year)";
  mysql_query($insert);
}
if(isset($_REQUEST['Faculty']))
{
    $maxq="select max(FacId) from faculty";
    $res=mysql_query($maxq);
    $data=mysql_fetch_row($res);
    $max=$data[0]+1;
    $EmpCode=$_REQUEST["empcode"];echo $EmpCode;
    $Fullname=$_REQUEST["Firstname"];echo $Fullname;
    $Mailid=$_REQUEST["Mailid"];echo $Mailid;
    $Mobileno=$_REQUEST["Mobileno"];echo $Mobileno;
    $Dob=$_REQUEST["DateOfBirth"];echo $Dob;
    $Address=$_REQUEST["Address"];echo $Address;
    $Gender=$_REQUEST["Gender"];echo $Gender;
    $DateOfJoin=$_REQUEST["DateOfJoin"];echo $DateOfJoin;
    $Qualification=$_REQUEST["Qualification"];echo $Qualification;
    $Experiance=$_REQUEST["Experiance"];echo $Experiance;
    $Username=$_REQUEST["Username"];echo $Username;
    $Password=$_REQUEST["Password"];echo $Password;
    $Image=$max.".jpeg";
    move_uploaded_file($_FILES["Image"]["tmp_name"],"Image/faculty/".$Image);
    $iq="insert into faculty(Fullname,EmpCode,Mailid,Mobileno,Dob,Address,Gender,DateOfJoin,Qualification,Experiance,Image,Username,Password) values ('$Fullname','$EmpCode','$Mailid','$Mobileno','$Dob','$Address','$Gender','$DateOfJoin','$Qualification','$Experiance','$Image','$Username','$Password' ) ";
    if(mysql_query($iq))
    {
      header("Location:index.php?msg=regsuccess");
    }
}
if(isset($_REQUEST['Student']))
{

    $maxq="select max(StudId) from student";
    $res=mysql_query($maxq);
    $degree="select * from degree where DegId=".$_REQUEST["Course"];
    $res1=mysql_query($degree);
    $data1=mysql_fetch_assoc($res1);
    $data=mysql_fetch_row($res);
    $max=$data[0]+1;
    $EnrollMent=$_REQUEST["Enrollment"];
    $Firstname=$_REQUEST["Firstname"];
    $Middlename=$_REQUEST["Middelname"];
    $Lastname=$_REQUEST["Lastname"];
    $Mailid=$_REQUEST["Mailid"];
    $Mobileno=$_REQUEST["Mobileno"];
    $Dob=$_REQUEST["DateOfBirth"];
    $Address=$_REQUEST["Address"];
    $SemId=$_REQUEST["Semid"];
    $Gender=$_REQUEST["Gender"];
    $Course=$data1["DegName"];
    $YearOfAdd=$_REQUEST["YearOfAdd"];
    $Username=$_REQUEST["Username"];
    $Password=$_REQUEST["Password"];
    $Image=$max.".jpeg";
    move_uploaded_file($_FILES["Image"]["tmp_name"],"Image/Student/".$Image);
      $iq="insert into student(EnrollMent,Firstname,Middlename,Lastname,Mailid,Mobileno,Address,SemId,Dob,Gender,Course,YearOfAdd,Image,Username,Password) values('$EnrollMent','$Firstname','$Middlename','$Lastname','$Mailid','$Mobileno','$Address',$SemId,'$Dob','$Gender','$Course', '$YearOfAdd','$Image','$Username','$Password') ";
      if(mysql_query($iq))
      {
        header("Location:index.php?msg=regsuccess");
      }
}
if( isset($_REQUEST['ajax']) && isset($_REQUEST['insertsem']) )
{
  $course=$_REQUEST['course'];
  $semster=$_REQUEST['insertsem'];
  $fees=$_REQUEST['fees'];
  $insert="insert into semester(SemName,DegId,FEES) values ('$semster',$course,$fees)";
  mysql_query($insert);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['insertsub']) )
{
  $semster=$_REQUEST['insertsub'];
  $Subname=$_REQUEST['subname'];
  $insert="insert into subject(SubName,SemId) values ('$Subname',$semster)";
  mysql_query($insert);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['insertmaterial']) )
{
  $maxq="select max(DowId) from metarial";
  $res=mysql_query($maxq);
  $data=mysql_fetch_row($res);
  $store=$data[0]+1;
  $name=$store.'.pdf';
  $location = 'Material/' . $name;
  $filename=$_REQUEST['insertmaterial'];
  $degid=$_REQUEST['course'];
  $semid=$_REQUEST['semester'];
  $subid=$_REQUEST['subject'];
  $insert="insert into metarial(FileName,DowPath,DegId,SemId,SubId) values ('$filename','$name',$degid,$semid,$subid)";
  mysql_query($insert);
}

if(isset($_REQUEST['uploadmat']) )
{
  if($_FILES["file"]["name"] != '')
  {
    $maxq="select max(DowId) from metarial";
    $res=mysql_query($maxq);
    $data=mysql_fetch_row($res);
    $name=$data[0].'.pdf';
    $location = 'Material/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
  }
}

if(isset($_REQUEST['Mark']) )
{
  $id=$_REQUEST['id'];
  foreach($_REQUEST['att'] as $no=>$attndn)
	 {
		$studid=$_REQUEST['StudId'][$no];
		$date=$_REQUEST['atdate'];
		$sel="select count(*) as already from attandance where StudId=$studid and Date='$date'";
		$res3=mysql_query($sel);
		$alrdy=0;
		while($data3=mysql_fetch_assoc($res3))
		{
			if($data3["already"] != 0)
			{
				$alrdy=1;
			}
		}
		if($alrdy==1)
		{
      header("location:Faculty-Dashboard.php?msg=todaymark&id=$id");
		}
		else
		{
			$quy="insert into attandance (StudId,Attvalue,Date) value ($studid,$attndn,'$date')";
			if(mysql_query($quy)){
          header("location:Faculty-Dashboard.php?msg=mark&id=$id");
      }
		}
	 }
}

if(isset($_POST['insertresult']))
{
  $max=1;$avgtot=0;
  $sem=$_REQUEST["semid"];
  $stud=$_REQUEST["student"];
  $id=$_REQUEST['id'];
  $sel="select count(*) as already from result where StudId=$stud and SemId=$sem";
  $res6=mysql_query($sel);
  $alrdy=mysql_num_rows($res6);
  /*if($alrdy != 0 )
  {
    header("location:Faculty-Dashboard.php?msg=alredy&id=$id");
  }
  else*/
  {
    if(isset($_REQUEST[$max])){$sub1=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub1=0;}
    if(isset($_REQUEST[$max])){$sub2=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub2=0;}
    if(isset($_REQUEST[$max])){$sub3=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub3=0;}
    if(isset($_REQUEST[$max])){$sub4=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub4=0;}
    if(isset($_REQUEST[$max])){$sub5=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub5=0;}
    if(isset($_REQUEST[$max])){$sub6=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub6=0;}
    if(isset($_REQUEST[$max])){$sub7=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub7=0;}
    if(isset($_REQUEST[$max])){$sub8=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub8=0;}
    if(isset($_REQUEST[$max])){$sub9=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub9=0;}
    if(isset($_REQUEST[$max])){$sub10=$_REQUEST[$max++];$avgtot=$avgtot+50;}else{$sub10=0;}
    $tot=$sub1+$sub2+$sub3+$sub4+$sub5+$sub6+$sub7+$sub8+$sub9+$sub10;
    $avg=$tot/$avgtot*100;
    $inqry="insert into result (StudId,SemId,Sub1,Sub2,Sub3,Sub4,Sub5,Sub6,Sub7,Sub8,Sub9,Sub10,ResTotal,ResAvg) value ($stud,$sem,$sub1,$sub2,$sub3,$sub4,$sub5,$sub6,$sub7,$sub8,$sub9,$sub10,$tot,$avg)";
    if(mysql_query($inqry)){echo "SuccessFully";}
  }
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['insertpay']) )
{
  $date=date("d-j-Y h:i:s");
  $studid=$_REQUEST['StudId'];
  $sem=$_REQUEST['SemId'];
  $razorpay_payment_id = $_REQUEST['insertpay'];
	$inqry="insert into payment (StudId,SemId,Date,paymentid) values($studid,$sem,'$date','$razorpay_payment_id')";
	mysql_query($inqry);
}
?>
