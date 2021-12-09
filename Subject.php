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
<script type="text/javascript">[lbl]ABC:</script>
<body>
<?php
include_once('connection.php');
?>
<h6>Search:</h6>
<div class="searchdiv form-inline">
    <select id="select" class="form-control"><option value="none">...Please Select Type ...</option>
      <?php
      $cou="select * from degree";
      $res=mysql_query($cou);
      while($row=mysql_fetch_assoc($res))
      {
        echo "<option value=".$row['DegId'].">".$row['DegName']."</option>";
      }

      ?>
  </select>&ensp;
  <div id="semestersel">Nothing Select Anything..</div>
  <button id="submit" class="btn btn-info" disabled="true" >Search</button>
</div>
<div id="table" class="btn-margin"></div>
<button id="plus1" class="btn btn-secondary btn-margin hide" ><i class="fas fa-plus"></i></button>
<div id="add1" class="hide">
  <input type="text" id="subname" class="btn-margin form-control" style="width:25%;" placeholder="Enter Subject Name  "><br><div class="text-danger" id="error_sub"></div>
  <button type="button" id="submitsubject" class="btn btn-info btn-margin">Add</button>
</div>
</body>
<script type="text/javascript">

$(document).ready(function(){
  $('#select').change(function(){
    var select=document.getElementById('select').value;
    if(select=="none")
    {
      $('#semestersel').html('Nothing Select Anything..');
    }
    else{
      $('#semestersel').html('');
      showselect(select);
    }
  });

  $('#submit').click(function(){
    showsubject();
  });

  $('#plus1').click(function(){
    $('#add1').fadeToggle();
  });

  $('#submitsubject').click(function(){
    var semid=document.getElementById('selectsem').value;
    var Subname=document.getElementById('subname').value;
    if(Subname==""){
      $('#error_sub').html('Data Required');

    }
    else{
      $('#error_sub').html('');
    $.ajax({
     url:'insertphp.php',
     type: 'post',
     data: {ajax: 1,insertsub:semid,subname:Subname},
     success: function(data){
      swal("Data Inserted SuccessFully.","","success");
      showsubject();
      $('#subname').val('');
     }
    });
  }
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

function showsubject(){
  var semid=document.getElementById('selectsem').value;
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,showsub:semid},
   success: function(data){
    $('#table').html(data);
    $('#plus1').show();
   }
  });
}
function deletesub(subid){
  swal({
    title: "Delete?",
    text: "Are You Sure Delete this Record??",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    cancelButtonClass: "btn-info",
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    closeOnConfirm: false,
    closeOnCancel: false
    },
    function(isConfirm) {
    if (isConfirm) {
      $.ajax({
       url:'deletephp.php',
       type: 'post',
       data: {ajax: 1,delsub:subid},
       success: function(data){
         swal("SuccessFully Subject Data Deleted","","success");
         showsubject();
       }
      });
    } else {
      swal("Hurray!", "The Data Is Safe", "error");
    }
  });
}

</script>
</html>
