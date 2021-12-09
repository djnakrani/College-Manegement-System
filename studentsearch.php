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
<div align="right"><a class="btn btn-info" href="export.php?exportstud=1" target="_blank">Export <i class="far fa-file-excel"></i></a></div>
<h6>Search:</h6>
<div class="searchdiv form-inline">
      <select id="select" class="form-control"><option>...Please Select Type ...</option>
      <option value="Firstname">First Name wise</option>
      <option value="Lastname">Last Name wise</option>
      <option value="Course">Course wise</option>
      <option value="YearOfAdd">Addmission Year Wise</option>
    </select>&ensp;
      <div id="non"> Not Select AnyThing..</div>
      <div id="call1" class="hide"><input type="text" class="value1 form-control" placeholder="Enter Firstname" required></div>
      <div id="call2" class="hide"><input type="text" class="value2 form-control" placeholder="Enter Lastname" required></div>
      <div id="call3" class="hide"><select class="value3 form-control" required><option value="">Select Any One Course...</option>
                      <?php
                      $cou="select * from degree";
                      $res=mysql_query($cou);
                      while($row=mysql_fetch_assoc($res))
                      {
                        echo "<option value=".$row['DegName'].">".$row['DegName']."</option>";
                      }

                      ?></select></div>
      <div id="call4" class="hide"><select class="value4 form-control" required><option value="">Select Admission Year...</option>
                      <?php
                      for($i=2020;$i>=2000;$i--)
                      {
                        echo "<option value=".$i.">".$i."</option>";
                      }
                      ?></select></div>&ensp;
      <button onClick="submitstud();" class="btn btn-info " >Search</button>
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
<script>
$(document).ready(function(){
  $("#select").change(function(){
    var get=document.getElementById('select').value;
    if(get=="Firstname")
    {
      $("#call1").show();
      $("#non").hide();$("#call2").hide();$("#call3").hide();$("#call4").hide();
      $('.value1').attr("id","value");
      $('.value2').removeAttr("id");
      $('.value3').removeAttr("id");
      $('.value4').removeAttr("id");
    }
    else if(get=="Lastname")
    {
      $("#call2").show();
      $("#non").hide();$("#call1").hide();$("#call3").hide();$("#call4").hide();
      $('.value2').attr("id","value");
      $('.value1').removeAttr("id");
      $('.value3').removeAttr("id");
      $('.value4').removeAttr("id");
    }
    else if(get=="Course")
    {
      $("#call3").show();
      $("#non").hide();$("#call2").hide();$("#call1").hide();$("#call4").hide();
      $('.value3').attr("id","value");
      $('.value2').removeAttr("id");
      $('.value1').removeAttr("id");
      $('.value4').removeAttr("id");
    }
    else if(get=="YearOfAdd")
    {
      $("#call4").show();
      $("#non").hide();$("#call2").hide();$("#call3").hide();$("#call1").hide();
      $('.value4').attr("id","value");
      $('.value2').removeAttr("id");
      $('.value3').removeAttr("id");
      $('.value1').removeAttr("id");
    }
    else {
      $("#non").show();
      $("#call1").hide();$("#call2").hide();$("#call3").hide();$("#call4").hide();
      $('#button').disable();
    }
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
function deletestud(StudId){
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
       data: {ajax: 1,delstud:StudId},
       success: function(data){
         swal("SuccessFully Student Data Deleted","","success");
         submitstud();
       }
      });
    } else {
      swal("Hurray!", "The Data Is Safe", "error");
    }
  });
}
function submitstud(){
    var select=document.getElementById('select').value;
    var value=document.getElementById('value').value;
    $.ajax({
     url:'selectphp.php',
     type: 'post',
     data: {ajax: 1,selectstud:select,values:value},
     success: function(data){
      $('#table').html(data);
     }
    });
    $(".selectrow").show();
}

</script>
</html>
