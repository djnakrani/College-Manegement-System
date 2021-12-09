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
<?php
  $id=$_REQUEST["id"];
  echo "<input type='hidden' id='id' value=".$id.">";
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <center><a href="" class="navbar-brand text-warning font-weight-bold"><img src="css/banner/logo1.png" width="50px" height="50px"/></a></center>

      <!-- Dashboard -->
      <li class="nav-item active">
        <a class="nav-link link-main" onclick="Dashboard();">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
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

      <!-- Material -->
      <li class="nav-item">
        <a class="nav-link" onclick="myFunction('download')">
          <i class="fas fa-file"></i>
          <span>Material</span></a>
      </li>

      <!-- FEES -->
      <li class="nav-item">
        <a class="nav-link link-main collapsed link-main" id="fees" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages" >
          <i class="fas fa-bell"></i>
          <span>FEES</span></span></a>
          <div id="collapsePages" class="collapse" data-parent="#accordionSidebar">
          <div class="bg-dark  py-2 collapse-inner rounded">
            <a class="collapse-item text-light bg-dark" onclick="myFunction('pay')">Pay</a>
            <a class="collapse-item text-light bg-dark" onclick="myFunction('status')">Status</a>
          </div>
        </div>
      </li>

      <!-- Attandance -->
      <li class="nav-item">
        <a class="nav-link link-main" onclick="myFunction('Attandance')">
          <i class="fas fa-book-reader"></i>
          <span>Attandance</span></a>
      </li>

      <!-- Result -->
      <li class="nav-item">
        <a class="nav-link link-main" onclick="myFunction('Result')">
          <i class="fab fa-cc-apple-pay"></i>
          <span>Result</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    </ul>

    <!-- Content Wrapper -->
    <diSv id="content-wrapper" class="d-flex flex-column">

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
                <i class="fas fa-power-off fa-2x "></i>
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
      <div class="container-fluid cpr8 bg-dark text-center">
        <p>@ Copyright For the National Group</p>
      </div>
    </div>
  </div>
</body>


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
  else if(msg=='mark')
  {
    swal('Successfully Attandance Markeded','','success')
    myFunction('TAttandance');
  }
  else if(msg=='todaymark')
  {
    swal('Sorry!!!','Today Attandance Already Marked','warning')
    myFunction('TAttandance');
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
    $('#contentpage').load("update.php?type=s&id="+ id);
   }
   else if(str=='password')
   {
    document.getElementById("headname").innerHTML = "Change Password";
    $('#contentpage').load("password.php?type=s&id="+ id);
   }
   else if(str=='download')
   {
    document.getElementById("headname").innerHTML = "Download Material & Assignment";
    $('#contentpage').load("Download.php");
   }
   else if(str=='pay')
   {
    document.getElementById("headname").innerHTML = "Pay Fees";
    $('#contentpage').load("payment-student.php?id="+ id);
   }
   else if(str=='status')
   {
    document.getElementById("headname").innerHTML = "Check Status Of Payment";
    $('#contentpage').load("paystatus-student.php?id="+ id);
   }
   else if(str=='Attandance')
   {
    document.getElementById("headname").innerHTML = "Attandance Details";
    $('#contentpage').load("Attandance-student.php?id="+ id);
   }
   else if(str=='Result')
   {
    document.getElementById("headname").innerHTML = "Result Details";
    $('#contentpage').load("Result-Student.php?id="+ id);
   }
  }
  function Dashboard()
  {
    document.getElementById("headname").innerHTML = "Dashboard";
    $('#contentpage').load("data.php?type=s&id="+id);
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
        location.replace('index.php');
      } else {
        swal("Hurray!", "You Are Safe In This Site", "error");
      }
    });
  }
  $('#fees').click(function(){
    $('#collapsePages').toggle();
  });

  </script>
</html>
