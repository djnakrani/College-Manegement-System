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
include_once('connection.php');
?>
<div align="right"><a class="btn btn-info" href="export.php?exportatt=1" target="_blank">Export <i class="far fa-file-excel"></i></a></div>
<h6>Search:</h6>
<div class="searchdiv form-inline">
    <select id="selectcourse" class="form-control"><option value="none">...Please Select Type ...</option>
      <?php
      $cou="select * from degree";
      $res=mysql_query($cou);
      while($row=mysql_fetch_assoc($res))
      {
        echo "<option value=".$row['DegId'].">".$row['DegName']."</option>";
      }

      ?>
  </select>&ensp;
  <div id="semestersel">Nothing Select Anything..</div>&ensp;


</div>
<?php $maxdate=date("Y-m-d"); ?>
<div id='selectdate' class="form-inline hide">
From:-<input class="form-control" type="date" id="fromdate" style="width:20%;"  max="<?php echo $maxdate; ?>" required><div class="text-danger" id="error_from"></div>
To:-<input class="form-control" type="date" id="todate" style="width:20%;" max="<?php echo $maxdate; ?>" required><div class="text-danger" id="error_to"></div>
<button id="submitsearch" class="btn btn-info btn-margin" >Get Data</button>
<input class="form-control" type="date" id="deletedate" style="width:20%;"  max="<?php echo $maxdate; ?>" required>
<button id="deletesearch" class="btn btn-danger btn-margin" >Delete Data</button>
</div>

  <div id="table"></div>

</body>
<script>

$(document).ready(function(){
  $('#selectcourse').change(function(){
    var select=document.getElementById('selectcourse').value;
    if(select=="none")
    {
      $('#semestersel').html('Nothing Select Anything..');

    }
    else{
      $('#semestersel').html('');
      showselect(select);
    }
  });


  $('#semestersel').change(function(){
    var semid=document.getElementById('selectsem').value;
    $.ajax({
     url:'selectphp.php',
     type: 'post',
     data: {ajax: 1,selectatt:semid},
     success: function(data){
      $('#selectdate').show();
     }
    });
  });

  $('#submitsearch').click(function(){
    var semid=document.getElementById('selectsem').value;
    var fromdate=document.getElementById('fromdate').value;
    var todate=document.getElementById('todate').value;
    if(fromdate=="")
    {
      $('#error_from').html('Select Date');
    }
    else if(todate==""){
      $('#error_to').html('Select Date');
    }
    else{
      $('#error_from').html('');
      $('#error_to').html('');
      $.ajax({
       url:'selectphp.php',
       type: 'post',
       data: {ajax: 1,selatt:semid,fromdate:fromdate,todate:todate},
       success: function(data){
        $('#table').html(data);
       }
      });
    }
  });

  $('#deletesearch').click(function(){
    var semid=document.getElementById('selectsem').value;
    var deletedate=document.getElementById('deletedate').value;
    $.ajax({
     url:'deletephp.php',
     type: 'post',
     data: {ajax: 1,delatt:semid,deletedate:deletedate},
     success: function(data){
         swal('Successfully Attandance Deleted','','success')
         $('#selectdate').hide();
         $('#table').html('');
     }
    });
  });
});

function showselect(semid){
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,showsem:semid},
   success: function(data){
    $('#semestersel').html(data);
   }
  });
}

</script>
</html>
