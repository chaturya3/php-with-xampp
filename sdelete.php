	<?php
include("DB.php");
?>

<?php

$m = $_REQUEST['ma'];
$q = "delete from student where rollno='$m'";
$r = mysqli_query($con,$q);
if($r)
{
	echo("<script>confirm('Do you want to Delete?')</script>");
	header("location:managestudent.php");
}
else
	echo mysqli_error($con);

?>