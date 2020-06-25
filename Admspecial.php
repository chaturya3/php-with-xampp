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
background-image:url(images/ba.jpg);
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
<?php
if(isset($_REQUEST['insert']))
{
	$spname=$_REQUEST['spname'];
	$spdate=$_REQUEST['spdate'];
	$timing=$_REQUEST['timing'];
	$avai=$_REQUEST['avai'];
	
	$price=$_REQUEST['price'];
	$image=$_FILES['photo']['name'];
	$t=$_FILES['photo']['tmp_name'];
	move_uploaded_file($t,"special/".$image);
	
	if(!$connection)
	{
		echo "connection error ".mysqli_connect_error();
	}
	else
	{
		$query="insert into specialitems(spname,spdate,timing,availability,price,photo) values('$spname','$spdate','$timing','$avai',$price,'$image')";
		$result=mysqli_query($connection,$query);
		echo mysqli_error($connection);
		echo "<script>alert('Special Items inserted successfully!!!')</script>";
	}
	
}

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
<td class="aa"><a href="Home.php" class="bb">Logout</a></td>
</tr>
<tr>
<td colspan="5" >
<div class="cc">

</div>
</td>
</tr>
<tr>
<td colspan="5"  style="color:black;background-color:#FDE1F7;">
<br>

<h1>Special Items</h1>
<table align="center" cellpadding="10" cellspacing="10">
<tr><td>Special Item Name:</td><td><input type="text" name="spname" id ="spname"></td></tr>
<tr><td>Date:</td><td><input type="date" name="spdate" id ="spdate"></td></tr>
<tr><td>Timing:</td><td><input type="time" name="timing" id ="timing"></td></tr>
<tr><td>Availability:</td><td><input type="text" name="avai" id ="avai"></td></tr>
<tr><td>Price:</td><td><input type="text" name="price" id ="price"></td></tr>
<tr><td>Photo:</td><td><input type="file" name="photo" id="photo"></td></tr>
<tr><td colspan="2" align="center">
<input type="submit" name="insert" id="insert" value="Insert">
<input type="reset" name="clear" id="clear" value="Clear">
</td></tr>

</table>
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