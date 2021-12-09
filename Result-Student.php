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
    $select="select * from student where StudId='$id'";
    $res=mysql_query($select);
    $data=mysql_fetch_assoc($res);
    $select1="select * from degree where DegName='".$data['Course']."'";
    $res1=mysql_query($select1);
    $data1=mysql_fetch_assoc($res1);
    $select2="select * from semester where DegId='".$data1['DegId']."'";
    $res2=mysql_query($select2);
    while($data2=mysql_fetch_assoc($res2))
    {
      echo "<button class='btn btn-margin2 btn-secondary' onclick='showresult(this.value)' value='".$data2['SemId']."'>".$data2['SemName']."</button>";
    }
    ?>
    <div align='center' class='result-table' id='result'></div>
    <center><button id='print' class="hide" onclick="printContent('result')">Print</button></center>
</body>
<script type="text/javascript">
function showresult(SemId){
  var urlParams = new URLSearchParams(location.search);
  var id=urlParams.get('id');
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,selectresult:SemId,StudId:id},
   success: function(data){
      $('#result').html(data);
      $('#print').show();
    }
  });
}

function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</html>
