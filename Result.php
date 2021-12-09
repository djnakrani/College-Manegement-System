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
<div align="right"><a class="btn btn-info" href="export.php?exportres=1" target="_blank">Export <i class="far fa-file-excel"></i></a></div>
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
<div class="row rowres" id='result'>
  <div class="left" id="selectrow">
    <form id='frm1'>
      Student Name:-<select id="student" name="student" class="form-control" style="width:80%;"><option value="none">...Select Student...</option></select><div class="text-danger" id="error_student"></div>
      <div id="marks"></div>
    <form>
  </div>
  <div class="right">
    <div class="selectrow">
      Select Number Of Rows:-<select id="maxRows" name="state">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="30">30</option>
        <option value="5000">Select All</option></select>
    </div>
    <div id="table"></div>
    <div class="body sticky-bottom">
        <ul class="pagination"></ul>
    </div>
  </div>
<div>
</body>
<script type="text/javascript">

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
     data: {ajax: 1,selectstudent:semid},
     success: function(data){
      $('#student').html(data);
      $('#selectrow').show();
      show();
     }
    });

    $.ajax({
     url:'selectphp.php',
     type: 'post',
     data: {ajax: 1,selectmark:semid},
     success: function(data){
      $('#marks').html(data);
      show();
     }
    });
  });

  $('#maxRows').change(function(){
    var a=$(this).val();
    pagination(a);
  });
});
function mark(obj){
  var no=obj.value;
  if(no<0 || no>50 || no=="")
  {
    swal("Mark Not Add Lessthan 0 and Greaterthan 50","","error")
  }
}
function insert() {
  var student=document.getElementById('student').value;
  if(student=="none")
  {
    $('#error_student').html('Field Required');
  }
  else{
    $('#error_student').html('');
    var urlParams = new URLSearchParams(location.search);
    var id=urlParams.get('id');
    var datastring = $("#frm1").serialize();
    var sem=$('#selectsem').val();
    datastring=datastring+"&semid="+sem+"&id="+id;
    $.ajax({
     url:'insertphp.php',
     type: 'post',
     data:datastring,
     success: function(data){
       swal("Result Data Inserted","Suceessfully","success");
       $('#frm1').trigger("reset");
       show();
     }
    });
  }
}
function pagination(maxRows){
  $('.pagination').html('');
  var trnum= 0;
  var totalRows=$('#mytable tbody tr').length;
  $('#mytable tr:gt(0)').each(function(){
    trnum++;
    if(trnum > maxRows){
      $(this).hide();
    }
    if(trnum <= maxRows){
      $(this).show();
    }
  });
  if(totalRows > maxRows)
  {
    var pagenum = Math.ceil(totalRows/maxRows);
    for(var i=1;i<=pagenum;){
      $('.pagination').append('<li data-page="'+i+'">'+ i++ +'</li>').show();
    }
    $('.pagination li:first-child').addClass('activeli');
    $('.pagination li').click(function(){
        var pageNum = $(this).attr('data-page');
        var trIndex=0;
        $('.pagination li').removeClass('activeli');
        $(this).addClass('activeli');
        $('#mytable tr:gt(0)').each(function(){
          trIndex++;
          if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
            $(this).hide();
          }
          else{
            $(this).show()
          }
        });
    });
  }
}
function show(){
  var semid=document.getElementById('selectsem').value;
  var no=document.getElementById('col').value
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,showres:semid,no:no},
   success: function(data){
      $('#table').html(data);
      $('#result').show();
      pagination(5);
   }
  });
}
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
function deleteresult(ResId){
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
       data: {ajax: 1,delresult:ResId},
       success: function(data){
         swal("SuccessFully Result Data Deleted","","success");
         show();
       }
      });
    } else {
      swal("Hurray!", "The Data Is Safe", "error");
    }
  });
}
</script>
</html>
