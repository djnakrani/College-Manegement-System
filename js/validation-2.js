$(document).ready(function(){
  var f_emp_error="false";
  var f_empname_error="false";
  var f_mobile_error="false";
  var f_mail_error="false";
  var f_dob_error="false";
  var f_address_error="false";
  var f_dateofjoin_error="false";
  var f_qualification_error="false";
  var f_experiance_error="false";
  var f_file_error="false";
  var f_username_error="false";
  var f_password_error="false";
  var f_cpassword_error="false";
  $('#f_empcode').change(function(){
    f_empcode();
  });
  $('#f_empname').change(function(){
    f_empname();
  });
  $('#f_mobileno').change(function(){
    f_mobileno();
  });
  $('#f_mailid').change(function(){
    f_mailid();
  });
  $('#f_dob').keyup(function(){
    f_dob();
  });
  $('#f_address').change(function(){
    f_address();
  });
  $('#f_dateofjoin').keyup(function(){
    f_dateofjoin();
  });
  $('#f_qualification').change(function(){
    f_qualification();
  });
  $('#f_experiance').change(function(){
    f_experiance();
  });
  $('#f_file').change(function(){
    f_file();
  });
  $('#f_username').change(function(){
    f_username();
  });
  $('#f_password').change(function(){
    f_password();
  });
  $('#f_cpassword').change(function(){
    f_cpassword();
  });
  $('#factvalide').submit(function(){
  f_emp_error="false";
  f_empname_error="false";
  f_mobile_error="false";
  f_mail_error="false";
  f_dob_error="false";
  f_address_error="false";
  f_dateofjoin_error="false";
  f_qualification_error="false";
  f_experiance_error="false";
  f_file_error="false";
  f_username_error="false";
  f_password_error="false";
  f_cpassword_error="false";
  f_empcode();
  f_empname();
  f_mobileno();
  f_mailid();
  f_dob();
  f_address();
  f_dateofjoin();
  f_qualification();
  f_experiance();
  f_file();
  f_username();
  f_password();
  f_cpassword();
  if(f_emp_error=="false" && f_empname_error=="false" && f_mobile_error=="false" && f_mail_error=="false" && f_dob_error=="false" && f_address_error=="false" && f_dateofjoin_error=="false" && f_qualification_error=="false" && f_experiance_error=="false" && f_file_error=="false" && f_username_error=="false" && f_password_error=="false" && f_cpassword_error=="false" )
  {
    var datastring = $("#factvalide").serialize();
    alert(datastring);
    $.ajax({
     url:'insertphp.php',
     type: 'post',
     data:datastring,
     success: function(data){
      swal("Registration Successfully","Suceessfully","success")
      location.replace("index.php")
     }
    });
    return false;
  }
  else{
    return false;
  }
  });
});
function f_empcode(){
  var empcode=$('#f_empcode').val();
  $.ajax({
   url:'selectphp.php',
   type: 'post',
   data: {selectemp:empcode},
   success: function(data){
     if(data=='success')
     {
       $('#f_error_empcode').show();
       $('#f_error_empcode').html('*Employee Code is Already Exist')
       f_emp_error="true";
     }
     else if(data=='error') {
       var regexname=/^([A-Z0-9]{10})$/;
       if (!$('#f_empcode').val().match(regexname)) {
         $('#f_error_empcode').show();
         $('#f_error_empcode').html('*Enter Correct Employee Code(eg.F123456789)')
         f_emp_error="true";
       }
       else{
         $('#f_error_empcode').html('');
       }
     }
  }
  });
}
function f_empname(){
  var regexname=/^([^0-9,!@#$%^&*]{3,20})$/;
  if (!$('#f_empname').val().match(regexname)) {
    $('#f_error_empname').show();
    $('#f_error_empname').html('*Only Alphabatic Charachater Allow Which length 3 to 10')
    f_empname_error="true";
  }
  else{
    $('#f_error_empname').html('');
  }
}
function f_mobileno(){
  var regexname=/^([0-9]{10})$/;
  if (!$('#f_mobileno').val().match(regexname)) {
    $('#f_error_mobileno').show();
    $('#f_error_mobileno').html('*Only Digit Allow Which length Only 10')
    f_mobile_error="true";
  }
  else{
    $('#f_error_mobileno').html('');
  }
}
function f_mailid(){
  var regexname=/^([[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,})$/;
  if (!$('#f_mailid').val().match(regexname)) {
    $('#f_error_mailid').show();
    $('#f_error_mailid').html('*Enter Vaild Mail Id with small letter')
    f_mail_error="true";
  }
  else{
    $('#f_error_mailid').html('');
   }
}
function f_dob(){
  var a=$('#f_dob').val();
  if(a=="")
  {
    $('#f_error_dob').show();
    $('#f_error_dob').html('*Required Date')
    f_dob_error="true";
  }
  else{
    $('#f_error_dob').html('');
  }
}
function f_address(){
  var regexname=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,20})/;
  if (!$('#f_address').val().match(regexname)) {
    $('#f_error_address').show();
    $('#f_error_address').html('*Address Required')
    f_address_error="true";
  }
  else{
    $('#f_error_address').html('');
   }
}
function f_dateofjoin(){
  var a=$('#f_dateofjoin').val();
  if(a=="")
  {
    $('#f_error_dateofjoin').show();
    $('#f_error_dateofjoin').html('*Required Date')
    f_dateofjoin_error="true";
  }
  else{
    $('#f_error_dateofjoin').html('');
  }
}
function f_qualification(){
  var regexname=/^([a-zA-Z\.]{3,10})$/;
  if (!$('#f_qualification').val().match(regexname)) {
    $('#f_error_qualification').show();
    $('#f_error_qualification').html('*Only Alphabatic Charachater Allow Which length 3 to 10')
    f_qualification_error="true";
  }
  else{
    $('#f_error_qualification').html('');
  }
}
function f_experiance(){
  var a=$('#f_experiance').val();
  if(a=="")
  {
    $('#f_error_experiance').show();
    $('#f_error_experiance').html('*Experiance Required')
    f_experiance_error="true";
  }
  else{
    $('#f_error_experiance').html('');
  }
}
function f_file(){
  var files = document.getElementById('f_file');
  var fileInput=files.value;
  var allowedExtensions = /(\.JPG|\.jpeg|\.png)$/i;
  if(!allowedExtensions.exec(fileInput))
  {
    $('#f_error_file').show();
    $('#f_error_file').html('*Only .jpg,.png,.jpeg file Allow')
    $('#f_file').val('');
    f_file_error="true";
  }
  else
  {
    maxsize='2048';
    var fsize=files.files[0].size/1024;
    if(fsize > maxsize)
    {
      $('#f_error_file').show();
      $('#f_error_file').html('*Maximum file size 2 MB, This file size is larger than 2 MB')
      $('#f_file').val('');
      f_file_error="true";
    }
    else
    {
      $('#f_error_file').html('');
    }
  }
}
function f_username(){
  var regexname=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,20})/;
  if (!$('#f_username').val().match(regexname)) {
    $('#f_error_username').show();
    $('#f_error_username').html('*Username must 1 Uppercase,1 Lowercase,1 Symbol,1 Number length 8 to 20')
    f_username_error="true";
  }
  else{
    $('#f_error_username').html('');
   }
}
function f_password(){
  var regexname=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
  if (!$('#f_password').val().match(regexname)) {
    $('#f_error_password').show();
    $('#f_error_password').html('*Password must 1 Uppercase,1 Lowercase,1 Symbol,1 Number length 8 to 20')
    f_password_error="true";
  }
  else{
    $('#f_error_password').html('');
   }
}
function f_cpassword(){
  var password=$('#f_password').val();
  var cpassword=$('#f_cpassword').val();
  if (password!=cpassword) {
    $('#f_error_cpassword').show();
    $('#f_error_cpassword').html('*conform password not match')
    f_cpassword_error="true";
  }
  else{
    $('#f_error_cpassword').html('');
   }
}
