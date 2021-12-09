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
  $razor_api_key = "rzp_live_zDITma9XhgYb4M";
  include_once("connection.php");
  $id=$_REQUEST["id"];
  $select="select * from student where StudId='$id'";
  $res=mysql_query($select);
  $data=mysql_fetch_assoc($res);
  $select1="select * from semester where SemId=".$data['SemId'];
  $res1=mysql_query($select1);
  $data1=mysql_fetch_assoc($res1);
  ?>
  <div align="center" class="div-pay">
    <table>
    <tr>
    <td>FullName:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data['Firstname'].'&nbsp;'.$data['Middlename'].'&nbsp;'.$data['Lastname'] ?></td></tr>
    <tr>
    <td>FEES:- </td><td>&nbsp;&nbsp;</td><td><input class='showonly' type='text' value='<?php  echo $data1['FEES']; ?>' readonly></td></tr>
    <tr>
    <td>Semester:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data1['SemName']; ?></td></tr>
    <tr>
    <td>Mobile Number:- </td><td>&nbsp;&nbsp;</td><td><input class='showonly' type='text' id='mobile' value='<?php  echo $data['Mobileno']; ?>' readonly></td></tr>
    <tr>
    <td>Email Id:- </td><td>&nbsp;&nbsp;</td><td><input class='showonly' type='text' id='mail' value='<?php  echo $data['Mailid']; ?>' readonly></td></tr>
</table>
<input type="hidden" value="<?php echo $data1['FEES']; ?>" id='amount'>
<input type="hidden" value="<?php echo $data['StudId']; ?>" id='StudId'>
<input type="hidden" value="<?php echo $data1['SemId']; ?>" id='semid'>


<button class="btn-info" id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
var StudId=document.getElementById('StudId').value;
var Mailid=document.getElementById('mail').value;
var Mobileno=document.getElementById('mobile').value;
var Semid=document.getElementById('semid').value;
var amount=document.getElementById('amount').value;
var options = {
    "key": "rzp_live_zDITma9XhgYb4M",
    "amount": 100,
    "currency": "INR",
    "name": "SVP COLLEGE PAYMENT",
    "description": "Pay Fees",
    "image": "css/banner/logo.png",
    "order_id": "",
    "handler": function (response){
        var paymentid=response.razorpay_payment_id;
        $.ajax({
         url:'insertphp.php',
         type: 'post',
         data: {ajax: 1,insertpay:paymentid,StudId:StudId,SemId:Semid},
         success: function(){
           swal("Your Payment is SuccessFully","Please Check Status","success")
         }
       })
    },
    "prefill": {
        "name": name,
        "email": Mailid,
        "contact": Mobileno
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#666666"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
</body>
</html>
