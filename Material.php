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

<div id='table' class="btn-margin"></div>
<button id="plus" class="btn btn-secondary btn-margin hide" ><i class="fas fa-plus"></i></button>
<div id="add" class="hide form-inline">
  <input type="text" id="filename" class="btn-margin form-control" placeholder="Enter File Name"><br><div class="text-danger" id="filename_error"></div>
  <select id="selectsubject" class="btn-margin form-control"><option value="nonecourse">...Please Select Subject ...</option></select><br><div class="text-danger" id="subject_error"></div>
  <input type="file" id="Material" onchange="pdf();" class="btn-margin form-control" >
  <button type="button" id="submitmaterial" class="btn btn-info btn-margin">Add</button>
</div>
</body>
<script type="text/javascript">

function deletematerial(materialid){
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
       data: {ajax: 1,delmaterial:materialid},
       success: function(data){
         swal("SuccessFully Material Data Deleted","","success");
         showmaterial();
       }
      });
    } else {
      swal("Hurray!", "The Data Is Safe", "error");
    }
  });
}
function showmaterial(){
  var semid=document.getElementById('selectsemester').value;
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {ajax: 1,selectmaterial:semid},
   success: function(data){
      $('#table').html(data);
      $('#plus').show();
      subject();
    }
  });
}
function pdf()
{
  var fileInput = document.getElementById('Material');
  var filePath = fileInput.value;
  var allowedExtensions = /(\.pdf)$/i;
  if(!allowedExtensions.exec(filePath))
  {
    swal("Opps..", "Please upload file having extensions .pdf only.", "info");
    fileInput.value = '';
  }

}
function subject(){
    var semid=document.getElementById('selectsemester').value;
    $.ajax({
     url:'selectphp.php',
     type: 'post',
     data: {ajax: 1,selectsub:semid},
     success: function(data){
        $('#selectsubject').html(data);
      }
    });
}
function upload(){
  var form_data= new FormData();
  form_data.append("file", document.getElementById('Material').files[0]);
  form_data.append("uploadmat", 1);
   $.ajax({
    url:"insertphp.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    success:function(){
      swal("SuccessFully Material Inserted","","success");
      showmaterial();
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

  $('#submitmaterial').click(function(){
    var course=document.getElementById('selectcourse').value;
    var semester=document.getElementById('selectsemester').value;
    var filename=document.getElementById('filename').value;
    var subject=document.getElementById('selectsubject').value;
    if(filename==""){
      $('#filename_error').html('Field Required');

    }
    else if(subject=="nonesemester")
    {
      $('#subject_error').html('Required Field');
    }
    else{
        $('#filename_error').html('');
        $('#subject_error').html('');
    $.ajax({
     url:'insertphp.php',
     type: 'post',
     data: {ajax: 1,insertmaterial:filename,course:course,semester:semester,subject:subject},
     success: function(data){
       upload();
       $('#filename').val('');
       $('#Material').val('');
     }
    });
    }
  });

  $('#plus').click(function(){
    $('#add').fadeToggle();
  });
});

</script>
</html>
