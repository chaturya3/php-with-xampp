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
if(!$connection)
{
	echo "Connection error ".mysqli_connect_error();
}
else
{
	$id=$_SESSION['cusid'];
	$q="select *from userdetail where cusid=$id";
	$result=mysqli_query($connection,$q);
	echo mysqli_error($connection);
	while($r=mysqli_fetch_assoc($result))
	{
		$vunmae=$r['username'];
		$vpass=$r['pass'];
		$vconfirm=$r['confirm'];
		$vemail=$r['email'];
		$vcontact=$r['contact'];
	}
}
	
	
if(isset($_REQUEST['update']))
{
	if(!$connection)
	{
		echo "Connection error ".mysqli_connect_error();
	}
	else
	{
		$uname=$_REQUEST['user'];
		$pass=$_REQUEST['pass'];
		$confirm=$_REQUEST['confirm'];
		$email=$_REQUEST['email'];
		$contact=$_REQUEST['contact'];
		$id=$_SESSION['cusid'];
		$q="update userdetail set username='$uname',pass='$pass',confirm='$confirm',email='$email',contact='$contact' where cusid=$id";
		$result=mysqli_query($connection,$q);
		echo "<script>alert('Profile Updated successfully!!!')</script>";
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
<h1><center>Customer Profile</center></h1>
<table align="center" cellpadding="10" cellspacing="10">

<tr><td>Username:</td><td><input type="text" name="user" id="user" value="<?php if(isset($vunmae)){echo $vunmae;}?>"  /></td></tr>
<tr><td>Password:</td><td><input type="password" name="pass" id="pass" value="<?php if(isset($vpass)){echo $vpass;}?>" /></td></tr>
<tr><td>Confirm Password:</td><td><input type="password" name="confirm" id="confirm" value="<?php if(isset($vconfirm)){echo $vconfirm;}?>"  /></td></tr>
<tr><td>E-mail :</td><td><input type="text" name="email" id="email" value="<?php if(isset($vemail)){echo $vemail;}?>"  /></td></tr>
<tr><td>Contact:</td><td><input type="number" name="contact" id="contact" value="<?php if(isset($vcontact)){echo $vcontact;}?>"  /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="update" id="update" value="Update" />
<input type="reset" name="clear" id="clear" value="Clear" /></td></tr>
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