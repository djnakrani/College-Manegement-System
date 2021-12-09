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
<table>
    <tr><td><div id="courses"></div></td><td>
    <button id="plus" class="btn btn-secondary btn-margin" ><i class="fas fa-plus"></i></button>
    <div id="add" class="hide">
      <input type="text" id="coursename" class="form-control" placeholder="Enter New Course Name"><br><div class="text-danger" id="error_course"></div>
      <input type="text" id="year" class="form-control" placeholder="Enter Course Year"><br><div class="text-danger" id="error_year"></div>
      <button type="button" id="submitcourse" class="btn btn-info btn-margin">Add</button>
    </div></td></tr>
    <tr><td><div id="semester"></div></td><td>
      <button id="plus1" class="btn btn-secondary btn-margin hide" ><i class="fas fa-plus"></i></button>
      <div id="add1" class="hide">
        <input type="text" id="semname" class="form-control" placeholder="Enter SEMESTER"><br><div class="text-danger" id="error_sem"></div>
        <input type="text" id="fees" class="form-control" placeholder="Enter Fees"><br><div class="text-danger" id="error_fees"></div>
        <button type="button" id="submitsemester" class="btn btn-info btn-margin">Add</button>
      </div>
      <div id="Update" class="hide"></div>
    </td></tr>
</table>
<input type="hidden" id="coursehid">
</body>
<script type="text/javascript">
displaycourse();
function displaycourse(){
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,selcourse:1},
   success: function(data){
    $('#courses').html(data);
   }
  });
}
function show(courseid){
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,selsem:courseid},
   success: function(data){
    $('#semester').html(data);
    $('#plus1').show();
    $('#coursehid').val(courseid);
   }
  });
}
function Updatefees(semid){
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,updatesel:semid},
   success: function(data){
     $('#Update').show();
     $('#plus1').hide();
     $('#Update').html(data);
     $('#add1').hide();
   }
  });
}
function updatedata(){
  var course=document.getElementById('coursehid').value;
  var semid=document.getElementById('semid').value;
  var fees=document.getElementById('updatefees').value;
  $.ajax({
   url:'updatephp.php',
   type: 'post',
   data: {ajax: 1,updatefee:semid,fees:fees},
   success: function(data){
     swal("SuccessFully Semester Data Updated","","success");
     show(course);
     $('#Update').hide();
   }
  });
}
function deletecourse(courseid){
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
       data: {ajax: 1,delcourse:courseid},
       success: function(data){
         swal("SuccessFully Course Data Deleted","","success");
         displaycourse();
       }
      });
    } else {
      swal("Hurray!", "The Data Is Safe", "error");
    }
  });
}
function deletesem(Semid){
  var course=document.getElementById('coursehid').value;
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
       data: {ajax: 1,delsem:Semid},
       success: function(data){
         swal("SuccessFully Course Data Deleted","","success");
         show(course);
       }
      });
    } else {
      swal("Hurray!", "The Data Is Safe", "error");
    }
  });
}

$(document).ready(function(){
  $('#plus').click(function(){
    $('#add').fadeToggle();
  });

  $('#plus1').click(function(){
    $('#add1').fadeToggle();
  });

  $('#submitcourse').click(function(){
    var course=document.getElementById('coursename').value;
    var year=document.getElementById('year').value;
    if(course==""){
      $('#error_course').html('Data Required');
      $('#error_year').html('');
    }
    else if(year==""){
      $('#error_course').html('');
      $('#error_year').html('Data Required');
    }
    else{
      $('#error_course').html('');
      $('#error_year').html('');
    $.ajax({
     url:'insertphp.php',
     type: 'post',
     data: {ajax: 1,insertcourse:course,year:year},
     success: function(data){
       swal("SuccessFully Course Data Inserted","","success");
       displaycourse();
       $('#coursename').val('');
       $('#year').val('');
     }
    });
    }
  });

  $('#submitsemester').click(function(){
    var course=document.getElementById('coursehid').value;
    var semname=document.getElementById('semname').value;
    var fees=document.getElementById('fees').value;
    if(semname==""){
      $('#error_sem').html('Data Required');
      $('#error_fees').html('');
    }
    else if(fees==""){
      $('#error_sem').html('');
      $('#error_fees').html('Data Required');
    }
    else{
      $('#error_sem').html('');
      $('#error_fees').html('');
    $.ajax({
     url:'insertphp.php',
     type: 'post',
     data: {ajax: 1,insertsem:semname,fees:fees,course:course},
     success: function(data){
       swal("SuccessFully Semester Data Inserted","","success");
       show(course);
       $('#semname').val('');
       $('#fees').val('');
     }
    });
  }
  });

});
</script>
</html>
