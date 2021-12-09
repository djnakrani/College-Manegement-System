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
<div align="right"><a class="btn btn-info" href="export.php?exportpay=1" target="_blank">Export <i class="far fa-file-excel"></i></a></div>
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
<div class="selectrow">
  Select Number Of Rows:-<select id="maxRows" name="state"><option value="5000">Select All</option>
    <option value="5">5</option>
    <option value="10">10</option>
    <option value="15">15</option>
    <option value="30">30</option></select>
</div>
<div id="table" class="datatable"></div>
<div class="body">
    <ul class="pagination"></ul>
</div>
</body>
<script type="text/javascript">

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
    var semid=document.getElementById('selectsemester').value;
    $.ajax({
     url:'selectphp.php',
     type: 'post',
     data: {ajax: 1,selectpayment:semid},
     success: function(data){
        $('#table').html(data);
        $(".selectrow").show();
    }
   });
 });

 $('#maxRows').change(function(){
   $('.pagination').html('');
   var trnum= 0;
   var maxRows=$(this).val();
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
 });
});

</script>
</html>
