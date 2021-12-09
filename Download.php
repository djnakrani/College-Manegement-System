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
      <select id="selectcourse" class="form-control"><option value="nonecourse">...Please Select Course ...</option>
        <?php
        $cou="select * from degree";
        $res=mysql_query($cou);
        while($row=mysql_fetch_assoc($res))
        {
          echo "<option value=".$row['DegId'].">".$row['DegName']."</option>";
        }
        ?>
    </select>&ensp;
    <select id="selectsemester" class="form-control"><option value="nonesemester">...Please Select Semester ...</option></select>
</div>

<center><div id='table' class="btn-margin"></div></center>

</body>
<script type="text/javascript">

function showmaterial(){
  var semid=document.getElementById('selectsemester').value;
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,select4studmaterial:semid},
   success: function(data){
      $('#table').html(data);
      $('#plus').show();
      subject();
    }
  });
}

$(document).ready(function(){
  $('#selectcourse').change(function(){
      var courseid=document.getElementById('selectcourse').value;
      $.ajax({
       url:'selectphp.php',
       type: 'post',
       data: {ajax: 1,selectcourse:courseid},
       success: function(data){
          $('#selectsemester').html(data);
      }
    });
  });

  $('#selectsemester').change(function(){
    showmaterial();
  });


});

</script>
</html>
