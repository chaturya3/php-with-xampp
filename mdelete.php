	<?php
include("DB.php");
?>

<?php

$m = $_REQUEST['ma'];
$q = "delete from externalmark where rollno='$m'";
$r = mysqli_query($con,$q);
if($r)
{
	echo("<script>confirm('Do you want to Delete?')</script>");
	header("location:managemark.php");
}
else
	echo mysqli_error($con);

?>