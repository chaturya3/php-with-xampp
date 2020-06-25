<html>
<head>
<style>
body{
	background-image:url(images/bg.gif);
	background-repeat:repeat-x;
	color: black;
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
background-image:url(images/b11.jpg);
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
session_start();

?>
<form name="f" method="post" action="" enctype="multipart/form-data">
<br>
<img src="images/logo.gif">
<table width="80%" border="0" cellspacing="0" align="center";>
<tr height="50">
<td class="aa"><a href="Usersearch.php" class="bb">Search</a></td>
<td class="aa"><a href="Userorder.php" class="bb">Order</a></td>
<td class="aa"><a href="Userstatus.php" class="bb">Status</a></td>
<td class="aa"><a href="Userprofile.php" class="bb">Profile</a></td>
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
<p align="right">
<?php
if(isset($_SESSION['cusname']))
{
	$a=$_SESSION['cusname'];
	echo "Welcome ".$a;
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</p>
<h1><center>Our Products</center></h1>
<table align="center" cellpadding="10" cellspacing="10" style="color:black;">
<tr><td>Select Category:</td>
<td>

<select name="items" id="items">
<option value="Cakes">Cakes</option>
<option value="specialitems">Special Items</option>
</select>

</td>
</tr>
<tr><td>Price:</td><td><input type="text" name="price" id="price" ></td></tr>
<tr><td align="right" colspan="2">
<input type="radio" name="rate" id="rate" value="above">Above
<input type="radio" name="rate" id="rate" value="below">Below
&nbsp;&nbsp;&nbsp;&nbsp;
<tr><td colspan="2" align="center">
<input type="submit" name="view" id="view" value="Search Product">

</td></tr>
</td></tr></table>
<table>
<tr><td align="center">
<?php
if(isset($_REQUEST['view']))
{
	$cat=$_REQUEST['items'];
	$price=$_REQUEST['price'];
	$rate="";
	if(isset($_REQUEST['rate']))
	{
		$rate=$_REQUEST['rate'];
	}
	
	if($cat=="Cakes")
	{
		if(!$connection)
		{
			echo "connection error ".mysqli_connect_error();
		}
		else
		{
			$query="";
			if($rate=="above")
			{
				$query="select *from product where price>=$price";  
			}
			else if($rate=="below")
			{
				$query="select *from product where price<=$price";  
			}
			else
			{
				$query="select *from product";
				
			}
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
	}
	else if($cat=="specialitems")
	{
	if(!$connection)
	{
		echo "connection error ".mysqli_connect_error();
	}
	else
	{
		$query="";
			if($rate=="above")
			{
				$query="select *from specialitems where price>=$price";  
			}
			else if($rate=="below")
			{
				$query="select *from specialitems where price<=$price";  
			}
			else
			{
				$query="select *from specialitems";
			}
	
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
			 
			 echo "<tr><td rowspan='5'><img src='special/$a' width='150' height='150'></td><td>".$r['spname']."</td></tr>";
			echo "<tr><td>".$r['spdate']."</td></tr>";
			echo "<tr><td>".$r['timing']."</td></tr>";
			echo "<tr><td>".$r['availability']."</td></tr>";
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

		
	}
}


?>

</td></tr>
</table>

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