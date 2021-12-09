<?php
include_once('connection.php');
if( isset($_REQUEST['ajax']) && isset($_REQUEST['delstud']) )
{
  $studid=$_REQUEST['delstud'];
  $delete="delete from student where StudId='$studid'";
  mysql_query($delete);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['delfact']) )
{
  $factid=$_REQUEST['delfact'];
  $delete="delete from faculty where FacId='$factid'";
  mysql_query($delete);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['delcourse']) )
{
  $course=$_REQUEST['delcourse'];
  $delete="delete from degree where DegId='$course'";
  mysql_query($delete);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['delsem']) )
{
  $sem=$_REQUEST['delsem'];
  $delete="delete from semester where SemId='$sem'";
  mysql_query($delete);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['delsub']) )
{
  $sub=$_REQUEST['delsub'];
  $delete="delete from subject where SubId='$sub'";
  mysql_query($delete);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['delmaterial']) )
{
  $mat=$_REQUEST['delmaterial'];
  $delete="delete from metarial where DowId='$mat'";
  mysql_query($delete);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['delresult']) )
{
  $res=$_REQUEST['delresult'];
  $delete="delete from result where ResId='$res'";
  mysql_query($delete);
}

if( isset($_REQUEST['ajax']) && isset($_REQUEST['delatt']) )
{
  $res=$_REQUEST['delatt'];
  $date=$_REQUEST['deletedate'];
  $qry="select * from student where SemId=$res";
  $find=mysql_query($qry);
  while ($data=mysql_fetch_assoc($find)) {
    $delete="delete from attandance where StudId='".$data['StudId']."' and Date='$date'";
    mysql_query($delete);
  }
}
?>
