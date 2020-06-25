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
background-image:url(images/bg1.jpg);
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
<td class="aa"><a href="Home.php" class="bb">Home</a></td>
<td class="aa"><a href="Product.php" class="bb">Product</a></td>
<td class="aa"><a href="#" class="bb">Services</a></td>
<td class="aa"><a href="Special.php" class="bb">Our Special</a></td>
<td class="aa"><a href="Admin.php" class="bb">Admin</a></td>
</tr>



<tr>
<td colspan="5"  style="color:black;background-color:#FDE1F7;">
<br>
<center><h1>PRODUCT DETAILS!!!</h1></center>
<?php
if(!$connection)
	{
		echo "connection error ".mysqli_connect_error();
	}
	else
	{
		$query="select *from product";
		$result=mysqli_query($connection,$query);
		echo mysqli_error($connection);
		echo "<table align='center' border='0' style='color:black;'>";
		echo "<tr>";
		$c=1;
		while($r=mysqli_fetch_assoc($result))
		{
		
			
			 $a=$r['photo'];
			 echo "<td>";
			 echo "<table cellspacing='10' cellpadding='10'>";
			 
			 echo "<tr><td rowspan='4'><img src='cake/$a' width='150' height='150'></td><td>".$r['pname']."</td></tr>";
			echo "<tr><td>".$r['flavour']."</td></tr>";
			echo "<tr><td>".$r['weight']."</td></tr>";
			echo "<tr><td>".$r['price']."</td></tr>";
			
			echo "</table>";
			 echo "</td>";
			 $c=$c+1;
			 
			  if($c%2==1)
			  {
				  echo "</tr><tr>";
			  }
		}
		
		echo "</tr></table>";
	}

?>
</td>
</tr>
</table>


</td>
</tr>
</table>

<table width="100%">

<tr bgcolor="#84284D" height="70">
<td align="center">
Copy right @ 2017 Bakery Shop System

</td>
</tr>
</table>
</form>
</body>
</html>