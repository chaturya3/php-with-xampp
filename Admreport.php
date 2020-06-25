<html>
<head>
<style>
body{
	background-image:url(images/bg.gif);
	background-repeat:repeat-x;
	font-family: Verdana;
	font-size: 12px;
	width: 100%;
	margin:0;
	padding:0;
}
img{
margin-left:90px;
}
.aa{
background:#84284D;
text-align:center;
width:20%;

}
.bb{
text-decoration:none;
text-shadow: 1px 1px 0 #ebb8c7;
color:white;
}
a:hover
{
//color: #00587A;
text-shadow: 1px 1px 0 #ebb8c7;
}
.aa:hover{
background:#CD6B97;
}
.cc
{
border:7px solid #BF4A67;
border-radius:4px;
width:99%;
height:350px;
background-image:url(images/b111.jpg);
background-size:100% 100%;
}
.ss{
width:100%;
height:500px;


}
h1
{
color:#84284d;
font-family: Trebuchet MS;
font-size: 25px;
font-style: italic;
font-weight: normal;
text-align:center;
}

.dd{
line-height: 30px;
text-align: justify;
color:#78394e;
font-size: 15px;  
padding-left:30px;
padding-right:30px;
}
.mm{
width:400px;
height:400px;
//border:7px solid #D2D7D3;
//border-radius:5px;
float:right;
}
</style>
</head>
<body>
<?php
include("config.php");
?>
<form name="f" method="post" action="" enctype="multipart/form-data">
<br>
<img src="images/logo.gif">
<table width="80%" border="0" cellspacing="0" align="center";>
<tr height="50">
<td class="aa"><a href="Admcake.php" class="bb">Cake</a></td>
<td class="aa"><a href="Admorder.php" class="bb">View Order</a></td>
<td class="aa"><a href="Admspecial.php" class="bb">Special Items</a></td>
<td class="aa"><a href="Admreport.php" class="bb">Report</a></td>
<td class="aa"><a href="Home.php" class="bb">Logout</a></td></tr>
<tr>
<td colspan="5" >
<div class="cc">

</div>
</td>
</tr>
<tr>
<td colspan="5"  style="color:black;background-color:#FDE1F7;">
<br>

<h1><center>Bakery Items Sales Report</center></h1>
<table align="center" cellpadding="10" cellspacing="10">
<tr><td>Select Date:</td><td><input type="date" name="odate" id="odate" value="<?php if(isset($da)){echo $da;}?>"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="report" id="report" value="Report">

</td></tr>
</table>

<?php

if(isset($_REQUEST['report']))
{
	
	$da=$_REQUEST['odate'];
	
	if(!$connection)
	{
		echo "Connection error ".mysqli_connect_error();
	}
	else
	{
	$q="select *from orderinfo where orderdate='$da'";
	$result=mysqli_query($connection,$q);
	echo mysqli_error($connection);
	echo "<table border='2' cellspacing='2' cellpadding='10' align='center'>";
	echo "<tr><th>Order No</th><th>Item Name</th><th>Price</th><th>Quantity</th><th>Amount</th><th>Status</th></tr>";
	while($r=mysqli_fetch_assoc($result))
	{
		$id=$r['orderno'];
		echo "<tr><td>".$r['orderno']."</td><td>".$r['pname']."</td><td>".$r['price']."</td><td>".$r['quantity']."</td><td>".$r['amount']."</td><td>".$r['status']."</td></tr>";
	}
	echo "</table>";
	}
	
}

?>
<br><br>
</td>
</tr>
</table>


</td>
</tr>
</table>
<table width="100%" class="bb">

<tr bgcolor="#84284D" height="70">
<td align="center">
Copy right @ 2020 Bakery Shop System

</td>
</tr>
</table>
</form>
</body>
</html>