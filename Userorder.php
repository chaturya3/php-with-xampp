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
background-image:url(images/b1.jpg);
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
<?php
if(isset($_REQUEST['order']))
{
	$pna=$_REQUEST['pname'];
	$orderdate=$_REQUEST['orderdate'];
	$quan=$_REQUEST['quan'];
	
	$pr="";
	$pid="";
	$id=$_SESSION['cusid'];
	$name=$_SESSION['cusname'];
	
	
			$b=explode("-",$pna);
			$n=count($b);
			$pname=$b[0];
			$cat=$b[$n-1];
			
	if(!$connection)
	{
		echo "connection error ".mysqli_connect_error();
	}
	else
	{
		if($cat=="product")
		{
			$q="select *from product where pname='$pname'";
			$result=mysqli_query($connection,$q);
			echo mysqli_error($connection);
			while($r=mysqli_fetch_assoc($result))
			{
				$pid=$r['pid'];
				$pr=$r['price'];
			}
		}
		else if($cat=="special")
		{
				$q="select *from specialitems where spname='$pname'";
			$result=mysqli_query($connection,$q);
			echo mysqli_error($connection);
			while($r=mysqli_fetch_assoc($result))
			{
				$pid=$r['spid'];
				$pr=$r['price'];
			}
		}
		
		
		$amt=$quan*$pr;
		$query="insert into orderinfo(orderdate,pid,pname,cusid,cusname,price,quantity,amount,status) values('$orderdate',$pid,'$pname',$id,'$name',$pr,$quan,$amt,'Waiting')";
		
		$res=mysqli_query($connection,$query);
		echo mysqli_error($connection);
		
		echo "<script>alert('Item Price Rs $pr  Total Amount Rs $amt')</script>";
	}
}

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
<h1><center>Customer Order</center></h1>
<table align="center" cellspacing="10" cellpadding="10">

<tr><td>Product Name:</td><td><select name="pname" id="pname">
<?php
if(!$connection)
		{
			echo "connection error ".mysqli_connect_error();
		}
		else
		{
			$q="select pname from product";
			$result=mysqli_query($connection,$q);
			echo mysqli_error($connection);
			while($r=mysqli_fetch_assoc($result))
			{
				$p=$r['pname'];
				$pp=$r['pname']."-product";
				echo "<option value='$pp'>$p</option>";
			}
			
			$q1="select spname from specialitems";
			$result1=mysqli_query($connection,$q1);
			echo mysqli_error($connection);
			while($r=mysqli_fetch_assoc($result1))
			{
				$p1=$r['spname'];
				$pp1=$r['spname']."-special";
				echo "<option value='$pp1'>$p1</option>";
			}
		}
?>

</select></td></tr>
<tr><td>Order Date:</td><td><input type="text" name="orderdate" id="orderdate" value="<?php echo date("Y-m-d");?>" readonly></td></tr>

<tr><td>Quantity:</td><td><input type="text" name="quan" id="quan"></td></tr>
<tr><td colspan="2" align="center">
<input type="submit" name="order" id="order" value="Order">
<input type="reset" name="clear" id="clear" value="Clear">
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