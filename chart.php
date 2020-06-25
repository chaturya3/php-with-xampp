<?php
$r1 = $_REQUEST['m1'];
$r2 = $_REQUEST['m2'];
$r3 = $_REQUEST['m3'];
$r4 = $_REQUEST['m4'];
$r5 = $_REQUEST['m5'];

$dataPoints = array( 
	array("label"=>"Mark1", "y"=>$r1),
	array("label"=>"Mark2", "y"=>$r2),
	array("label"=>"Mark3", "y"=>$r3),
	array("label"=>"Mark4", "y"=>$r4),
	array("label"=>"Mark5", "y"=>$r5),
	
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Mark Comparison Chart"
	},
	subtitles: [{
		text: "Student"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<a href='viewfinal.php'>Go Back</a>
</body>
</html>      