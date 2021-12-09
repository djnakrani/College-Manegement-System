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
  $qry="select * from student where StudId='$id'";
  $res=mysqli_query($connect,$qry);
  $data=mysqli_fetch_assoc($res);
  $qry1="select * from semester where SemId=".$data['SemId'];
  $res1=mysqli_query($connect,$qry1);
  $data1=mysqli_fetch_assoc($res1);
  ?>
  <div align="center" class="div-pay">
    <table>
    <tr>
    <td>FullName:-</td><td>&nbsp;&nbsp;</td><td><?php echo $data['Firstname'].'&nbsp;'.$data['Middlename'].'&nbsp;'.$data['Lastname'] ?></td></tr>
    <tr>
    <td>FEES:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data1['FEES']; ?></td></tr>
    <tr>
    <td>Semester:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data1['SemName']; ?></td></tr>
    <tr>
    <td>Mobile Number:- </td><td>&nbsp;&nbsp;</td><td><?php echo $data['Mobileno']; ?> </td></tr>
    <tr>
    <td>Email Id:- </td><td>&nbsp;&nbsp;</td><td><?php  echo $data['Mailid']; ?> </td></tr>
</table>

<?php
$date=date("j-D-Y g:i:s");
$studid=$data['StudId'];
$sem=$data['SemId'];
if ($_POST) {
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
	$inqry="insert into payment (StudId,SemId,Date,paymentid) values($studid,$sem,'$date','$razorpay_payment_id')";
	if(mysql_query($inqry))
	{
		?>
			<script> swal("Payment Successfully!!", "", "success") </script>
		<?php
	}

}
?>

<form action="https://www.example.com/payment/success/" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_live_zDITma9XhgYb4M"
    data-amount="100"
    data-currency="INR"
    data-order_id=""
    data-buttontext="Pay with Razorpay"
    data-name="SVP COLLEGE FEES"
    data-description="PAY FEES"
    data-image="css/banner/logo.png"
    data-prefill.name="<?php echo $data['Firstname'];?>"
    data-prefill.email="<?php echo $data['Mailid'];?>"
    data-prefill.contact="<?php echo $data['Mobileno'];?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>
</body>
</html>
