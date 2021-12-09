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
  <div id="chart_div" style="width: 900px; height: 300px;"></div>
<?php
include_once("connection.php");
$id=$_REQUEST["id"];
$query = "select studid,extract(month from date) as month,extract(year from date) as year,count(*) as total,sum(attvalue) as present from attandance where StudId='".$id."' group by month,year,studid";
$result = mysql_query($query);
 ?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load("current", {packages:['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ["Element","Total Days","Present Days"],
       <?php
       while($row = mysql_fetch_array($result))
       {
         $month=date("F", mktime(0, 0, 0, $row['month'], 10));
         echo '["'.$month.'-'.$row["year"].'",'.$row["total"].','.$row["present"].'],';
       }
       ?>
     ]);

     var options = {
         title: 'Student Attandance',
         hAxis: {title: 'Month-Year',  titleTextStyle: {color: '#3366ff'}},
         vAxis: {minValue: 10}
       };
       var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
          chart.draw(data, options);
 }

 </script>

</body>
<script>
window.onload = function() {

var dataPoints = [];

var options =  {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Daily Sales Data"
	},
	axisX: {
		valueFormatString: "DD MMM YYYY",
	},
	axisY: {
		title: "USD",
		titleFontSize: 24,
		includeZero: false
	},
	data: [{
		type: "spline",
		yValueFormatString: "$#,###.##",
		dataPoints: dataPoints
	}]
};

function addData(data) {
	for (var i = 0; i < data.length; i++) {
		dataPoints.push({
			x: new Date(data[i].date),
			y: data[i].units
		});
	}
	$("#chartContainer").CanvasJSChart(options);

}
$.getJSON("https://canvasjs.com/data/gallery/jquery/daily-sales-data.json", addData);

}
</script>
</html>
