<html>
<head>
<title></title>
<style>
.aa
{
color:white;
font-size:24px;
text-decoration:none;
}
.aa:hover
{
color:yellow;
font-size:28px;
text-decoration:overline;
}
body{
background-image:url('image/mainbg.jpg');
background-size:100% 100%;
background-attachment:fixed;
}
</style>
</head>
<body>
<form name="f" method="post" action="" onSubmit="mysubmit();">
	<?php
	session_start();
include("DB.php");
?>

<?php

if(isset($_REQUEST['signin']))
{
	$u=$_REQUEST['user'];
	$p=$_REQUEST['pass'];
	$q = "select * from student where email='$u' and password='$p'";
	$res = mysqli_query($con,$q);
	
	while($r =mysqli_fetch_assoc($res))
	{
		$rn = $r['rollno'];
		$n = $r['name'];
		$e = $r['email'];
	}
	if(isset($e))
	{
		//session_start();
		$_SESSION['roll']=$rn;
        $_SESSION['name']=$n;
        $_SESSION['mail']=$e;
		header("location:tstudent.html");
	}
	else
	{
		echo "<script>alert('Invalid Username and Password')</script>";
		
	}
	
}

?>
<table border="0" width="100%" align="center" bgcolor="black" 
cellpadding="0" cellspacing="0" style="text-align:center">
<tr height="70px">
<td width="10%"><img src="image/logo1.png" height="70px"
width="100%">
</td>
<td width="40%"><center><p style="color:white;font-size:40px">Student Result Analysis
</center></p></td>
<td width="10%"><a href="index.html" class="aa">Home</a></td>
<td width="10%"><a href="slogin.php" class="aa">Student</a></td>
<td width="10%"><a href="tlogin.php" class="aa">Teacher</a></td>
<td width="10%"><a href="alogin.php" class="aa">Admin</a></td>
<td width="10%"><a href="contact.html" class="aa">Contact</a></td>
</tr>
</table>

<table border="0" width="70%" align="center" cellpadding="0" cellspacing="0">
<tr height="300px">
<td><img src="image/banner.jpg" height="300px" width="100%">
</td>
</tr>
</table>
<table border="0" width="70%" align="center" bgcolor="lightgrey" 
cellpadding="0" cellspacing="0" style="color:black;text-align:center
;padding:20px;">
<tr>
<td style="padding:20px;">UserName</td>
<td><input type='text' name='user' id='uname'></td>
</tr>
<tr>
<td style="padding:20px;">Password</td>
<td><input type='password' name='pass' id='pass'></td>
</tr>
<tr>

<td style="padding:20px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='submit' value='login' name="signin"
style='height:50px;width:100px;'></td>
</table>
<table border="0" width="70%" align="center" bgcolor="black" 
cellpadding="0" cellspacing="0" style="color:white;
text-align:center;">
<tr height="100px">
<td><h2>Student Result Analysis @ 2019</h2></td>
</tr>
</table>
</body>
</html>