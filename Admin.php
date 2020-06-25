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
background-image:url(images/c1.jpg);
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

if(isset($_REQUEST['signinadmin']))
{
	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];
	if($user=="admin" && $pass=="admin")
	{
		header("location:Admcake.php");
	}
	else
	{
		echo "<script>alert('Invalid Username and Password')</script>";
	}
	
}


if(isset($_REQUEST['signin']))
{
	
	$u=$_REQUEST['cususer'];
	$p=$_REQUEST['cuspass'];
	if(!$connection)
	{
			echo "Connection error is ".mysqli_connect_error();
			
	}
	else
	{
			$q="select *from userdetail where username='$u' and pass='$p'";
			$result=mysqli_query($connection,$q);
			echo mysqli_error($connection);
			while($r=mysqli_fetch_assoc($result))
			{
				$username=$r['username'];
				$id=$r['cusid'];
			}
			if(isset($username))
			{
				$_SESSION['cusname']=$username;
				$_SESSION['cusid']=$id;	
				header("location:UserSearch.php");
			}
			else
			{
				echo "<script>alert('Invalid Username and Password')</script>";
			}
	}
	
}
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
<td colspan="5" >
<div class="cc">

</div>
</td>
</tr>


<tr>
<td colspan="3"  style="color:black;background-color:#FDE1F7;">

<table align="center" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center"><h2>Admin Login </h2></td></tr>
<tr><td>Username:</td><td><input type="text" name="user" id="user" /></td><td rowspan="3">
<img src="images/ll.png" width="150">
</td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" id="pass"   /></td></tr>

<tr><td colspan="2" align="center"><input type="submit" name="signinadmin" id="signinadmin" value="Sign In" />
<input type="reset" name="clear" id="clear" value="Clear" /></td></tr>
</table>
</td>
<td colspan="2"  style="color:black;background-color:#FDE1F7;">

<table align="center" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center"><h2>User Login </h2></td></tr>
<tr><td>Username:</td><td><input type="text" name="cususer" id="cususer" /></td><td rowspan="3">

</td></tr>
<tr><td>Password:</td><td><input type="password" name="cuspass" id="cuspass"   /></td></tr>

<tr><td colspan="2" align="center"><input type="submit" name="signin" id="signin" value="Sign In" />
<input type="reset" name="clear" id="clear" value="Clear" /></td></tr>

<tr><td colspan="2" align="center"><a href="Newuser.php" style="color:blue;">New User?</a></td></tr>

</table>
</td>

</tr>
</table>

<table width="100%">

<tr bgcolor="#84284D" height="70">
<td align="center">
Copy right @ 2020 Bakery Shop System

</td>
</tr>
</table>
</form>
</body>
</html>