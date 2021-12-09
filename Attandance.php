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

  <button id="submitsearch" class="btn btn-info btn-margin" >Search</button>
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


  $('#submitsearch').click(function(){
    var urlParams = new URLSearchParams(location.search);
    var id=urlParams.get('id');
    var semid=document.getElementById('selectsem').value;
    $.ajax({
     url:'selectphp.php',
     type: 'post',
     data: {ajax: 1,selectatt:semid,id:id},
     success: function(data){
      $('#table').html(data);
      $('#mark').show();
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
    $('#submit').prop('disabled', false);
   }
  });
}

</script>
</html>
