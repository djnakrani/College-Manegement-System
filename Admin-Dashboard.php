<!DOCTYPE html>
<html lang="en">

<head>
  <title>BackEnd | Dashboard</title>
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

  <!-- Custom Css-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">

</head>
<body>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <center><a href="" class="navbar-brand text-warning font-weight-bold"><img src="css/banner/logo1.png" width="50px" height="50px"/></a></center>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Profile -->
      <li class="nav-item active">
        <a class="nav-link link-main" onclick="Dashboard();">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profile</span></a>
      </li>

      <!-- Update Data -->
      <li class="nav-item">
        <a class="nav-link link-main" onclick="myFunction('data')">
          <span>Update Data</span></a>
      </li>

      <!-- Change Password -->
      <li class="nav-item">
        <a class="nav-link link-main" onclick="myFunction('password')">
          <span>Change Password</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Student -->
      <li class="nav-item">
        <a class="nav-link link-main" onclick="myFunction('student')">
          <i class="fas fa-book-reader"></i>
          <span>Student</span></a>
      </li>


      <!-- Faculty -->
      <li class="nav-item">
        <a class="nav-link link-main" onclick="myFunction('faculty')">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Faculty</span></a>
      </li>

      <!-- Courses -->
      <li class="nav-item">
        <a class="nav-link collapsed link-main" id="course" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages" >
          <i class="fas fa-graduation-cap"></i>
          <span>Courses</span></span></a>
          <div id="collapsePages" class="collapse" data-parent="#accordionSidebar">
          <div class="bg-dark  py-2 collapse-inner rounded">
            <a class="collapse-item text-light bg-dark" onclick="myFunction('Course')">Add Courses</a>
            <a class="collapse-item text-light bg-dark" onclick="myFunction('Subject')">Add Subject</a>
          </div>
        </div>
      </li>

      <!-- Material -->
      <li class="nav-item">
        <a class="nav-link link-main" onclick="myFunction('Material')">
          <i class="fas fa-file"></i>
          <span>Material</span></a>
      </li>

      <!-- Payment -->
      <li class="nav-item">
        <a class="nav-link link-main" onclick="myFunction('Payment')">
          <i class="fab fa-cc-apple-pay"></i>
          <span>Payment</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    </ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <h3 id="headname"></h3>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider "></div>
            <!--Logout-->
            <li class="nav-item">
              <a class="nav-link bg-dark" onclick="return logout()">
                <i class="fas fa-power-off fa-2x" ></i>
              </a>
            </li>
          </ul>
        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div id="contentpage"></div>
        </div>
      </div>

      <!-- copyright -->
      <div class="container-fluid cpr8 bg-dark text-white text-center">
        <p>@ Copyright For the National Group</p>
      </div>
    </div>
  </div>

</body>
<?php

?>

  <!-- Custom JavaScript  -->
  <script type="text/javascript">
    var urlParams = new URLSearchParams(location.search);
    var id=urlParams.get('id');
    var msg=urlParams.get('msg');
    if(msg=='updatep')
    {
      swal('Successfully Password Changed','','success')
      Dashboard();
    }
    else if(msg=='update')
    {
      swal('Successfully Profile Changed','','success')
      Dashboard();
    }
    else {
      myFunction('First');
    }
    function myFunction(str) {
     if(str=='First')
     {
        swal('Welcome','','info');
        Dashboard();
     }
     else if(str=='data')
     {
    	document.getElementById("headname").innerHTML = "Data Update";
      $('#contentpage').load("update.php?type=a&id="+ id);
     }
     else if(str=='password')
     {
    	document.getElementById("headname").innerHTML = "Change Password";
      $('#contentpage').load("password.php?type=a&id="+ id);
     }
     else if(str=='student')
     {
    	document.getElementById("headname").innerHTML = "Students Details";
      $('#contentpage').load("studentsearch.php");
     }
     else if(str=='faculty')
     {
    	document.getElementById("headname").innerHTML = "Faculty Details";
      $('#contentpage').load("facultysearch.php");
     }
     else if(str=='Course')
     {
      document.getElementById("headname").innerHTML = "Course Details";
      $('#contentpage').load("Course.php");
     }
     else if(str=='Subject')
     {
      document.getElementById("headname").innerHTML = "Subject Details";
      $('#contentpage').load("Subject.php");
     }
     else if(str=='Material')
     {
      document.getElementById("headname").innerHTML = "Material Details";
      $('#contentpage').load("Material.php");
     }
     else if(str=='Payment')
     {
      document.getElementById("headname").innerHTML = "Payment Details";
      $('#contentpage').load("Payment.php");
     }

    }
    function Dashboard()
    {
    	document.getElementById("headname").innerHTML = "Dashboard";
      $('#contentpage').load("data.php?type=a&id="+id);
    }
    function logout(){
      swal({
        title: "Logout",
        text: "Are You Sure Logout this page??",
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
          location.replace('admin.php');
        } else {
          swal("Hurray!", "You Are Safe In This Site", "error");
        }
      });
  	}
    $('#course').click(function(){
      $('#collapsePages').toggle();
    });

  </script>
</html>
