<?php
include_once("connection.php");
if(isset($_REQUEST["adminupdate"]))
{
  $id=$_REQUEST["id"];
  $add=$_REQUEST["Address"];
  $mob=$_REQUEST["Mobileno"];
  $mail=$_REQUEST["Mailid"];
  $uqry="update admin set Address='$add',Mobileno='$mob',Mailid='$mail' where AdminId='$id'";
  if(mysql_query($uqry))
  {
    header("location:Admin-Dashboard.php?msg=update&id=$id");
  }
}
if(isset($_REQUEST["facultyupdate"]))
{
  $id=$_REQUEST["id"];
  $add=$_REQUEST["Address"];
  $mob=$_REQUEST["Mobileno"];
  $mail=$_REQUEST["Mailid"];
  $Qualification=$_REQUEST["Qualification"];
  $Experiance=$_REQUEST["Experiance"];
  $uqry="update faculty set Mailid='$mail',Mobileno='$mob',Address='$add',Qualification='$Qualification',Experiance='$Experiance' where FacID='$id'";
  if(mysql_query($uqry))
  {
    header("location:Faculty-Dashboard.php?msg=update&id=$id");
  }
}
if(isset($_REQUEST["studentupdate"]))
{
  $id=$_REQUEST["id"];
  $add=$_REQUEST["Address"];
  $mob=$_REQUEST["Mobileno"];
  $mail=$_REQUEST["Mailid"];
  $sem=$_REQUEST["SemId"];
  $uqry="update student set Mailid='$mail',Mobileno='$mob',Address='$add',SemId='$sem' where StudId='$id'";
  if(mysql_query($uqry))
  {
      header("location:Student-Dashboard.php?msg=update&id=$id");
  }
}
if(isset($_REQUEST["passwordadmin"]))
{
  $id=$_REQUEST["id"];
  $confrompassword=$_REQUEST["confrompassword"];
  $uqry="update admin set Password='$confrompassword' where AdminId='$id'";
  if(mysql_query($uqry))
  {
    header("location:Admin-Dashboard.php?msg=updatep&id=$id");
  }
}
if(isset($_REQUEST["passwordfaculty"]))
{
  $id=$_REQUEST["id"];
  $confrompassword=$_REQUEST["confrompassword"];
  $uqry="update faculty set Password='$confrompassword' where FacID='$id'";
  if(mysql_query($uqry))
  {
    header("location:Faculty-Dashboard.php?msg=updatep&id=$id");
  }
}
if(isset($_REQUEST["passwordstudent"]))
{
  $id=$_REQUEST["id"];
  $confrompassword=$_REQUEST["confrompassword"];
  $uqry="update student set Password='$confrompassword' where StudId='$id'";
  if(mysql_query($uqry))
  {
      header("location:Student-Dashboard.php?msg=updatep&id=$id");
  }
}
if(isset($_REQUEST["updatefee"]))
{
  $id=$_REQUEST["updatefee"];
  $fees=$_REQUEST["fees"];
  $uqry="update semester set FEES='$fees' where SemId='$id'";
  mysql_query($uqry);

}
?>
