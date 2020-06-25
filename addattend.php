        <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SRA</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>       
    </head>
    <body class="top-navbar-fixed">
	



        <div class="main-wrapper">
    <nav class="navbar top-navbar bg-white box-shadow">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="navbar-header no-padding">
                                          <a class="navbar-brand" href="dashboard.html">
                                              Student Result | Admin
                                          </a>
                              <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                                                  <span class="sr-only">Toggle navigation</span>
                                                  <i class="fa fa-ellipsis-v"></i>
                                          </button>
                              <button type="button" class="navbar-toggle mobile-nav-toggle" >
                                                  <i class="fa fa-bars"></i>
                                          </button>
                                  </div>
                          <!-- /.navbar-header -->

                                  <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                          <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                  <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
                                  <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>

                                                  <li class="hidden-xs hidden-xs"><!-- <a href="#">My Tasks</a> --></li>

                                          </ul>
                              <!-- /.nav navbar-nav -->

                                          <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">


                                                      <li><a href="index.html" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>



                                          </ul>
                              <!-- /.nav navbar-nav navbar-right -->
                                  </div>
                                  <!-- /.navbar-collapse -->
                      </div>
                      <!-- /.row -->
                  </div>
                  <!-- /.container-fluid -->
              </nav>

              <div class="content-wrapper">
                  <div class="content-container">

                      <div class="left-sidebar bg-black-300 box-shadow ">
                          <div class="sidebar-content">
                              <div class="user-info closed">
  <!--                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                  <h6 class="title">John Doe</h6>
                                  <small class="info">PHP Developer</small>-->
                              </div>
                              <!-- /.user-info -->

                              <div class="sidebar-nav">
                                  <ul class   ="side-nav color-gray">
                                      <li class="nav-header">
                                          <span class="">Main Category</span>
                                      </li>
                                              <li>
                                          <a href="tdash.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

                                      </li>

                                      <li class="nav-header">
                                          <span class="">Appearance</span>
                                      </li>
                                      <li class="has-children">
                                          
                                          <ul class="child-nav">
                                              <li><a href="viewfaculty.php"><i class="fa fa-bars"></i> <span>View Faculty</span></a></li>
                                              <li><a href="viewstudents.php"><i class="fa fa fa-server"></i> <span>View Students</span></a></li>

                                          </ul>
                                      </li>
    <li class="has-children">
                                              
                                          <ul class="child-nav">
                                              <li><a href="addinmark.php"><i class="fa fa-bars"></i> <span>Add Marks</a></li>
                                              <li><a href="viewmarks.php"><i class="fa fa fa-server"></i> <span>View Marks</a></li>
												<li><a href="addattend.php"><i class="fa fa fa-server"></i> <span>Add Attendence</a></li>
											  <li><a href="viewattend.php"><i class="fa fa fa-server"></i> <span>View Attendence</a></li>
											</ul>
                                      </li>
     
                                          
                              </div>
                              
                              <!-- /.sidebar-nav -->
                          </div>
                          <!-- /.sidebar-content -->
                      </div>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title">Dashboard</h2>
                                  
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                      
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
								<?php
include("DB.php");
?>

<?php
$na="";
$ro="";
$bra="";
if(isset($_REQUEST['search']))
{
	$rn =$_REQUEST['roll_no'];
	
$q = "select * from student where rollno='$rn'";
$r = mysqli_query($con,$q);

if($re = mysqli_fetch_assoc($r))
{	
	$ro = $re['rollno'];
	$na = $re['name'];
	$bra = $re['branch'];
	//$cl = $re['class'];
}
}
$tot="";
if(isset($_REQUEST['submit']))
{
	$rl = $_REQUEST['roll'];
	$nam = $_REQUEST['name'];
	$br = $_REQUEST['branch'];
	$ca = $_REQUEST['class'];
	$m1 = $_REQUEST['m1'];
	$m2 = $_REQUEST['m2'];
	$m3 = $_REQUEST['m3'];
	$q="insert into attendance values('$rl','$nam','$br','$ca','$m1','$m2','$m3')";
	$r = mysqli_query($con,$q);
	if($r)
		echo "<script>alert('Inserted Success')</script>";
	
}
?>
                 		<form action="" method="post">
	<table>
	<tr>
			<td>Enter Roll No: </td>
			<td><input type="text" name="roll_no" size="30"  />
			<td><input type='submit' name='search' value='Search' size='30'></td>
		</tr>
		</form>
		<tr>
		<form action="">
		<tr>
			<td>Roll No: </td>
			<td><input type="text" name="roll" size="20" value="<?php echo $ro ?>"/></td>
		</tr>
		<tr>
			<td>Student Name: </td>
			<td><input type="text" name="name" size="20" value="<?php echo $na ?>"/></td>
		</tr>
		<td>Branch: </td>
			<td>
			<input type="text" name="branch" size="20" 
			value="<?php echo $bra?>" />
			</td>
		</tr>
		
		<tr>
			<td>Class: </td>
			<td>
			<select name="class">
				<option>
					I
				</option>
				<option>
					II
				</option>
				<option>
					III
				</option>
				<option>
					IV
				</option>
			</select>
			</td>
		</tr>
		
		
		
		<tr>
			<td>Subject Name</td>
			<td><input type='text' name='m1' id='m1' /></td>
		</tr>
		
		<tr>
			<td>Attendence (%): </td>
			<td><input type='text' name='m2' id='m2' /></td>
		</tr>
		<tr>
			<td>Remarks </td>
			<td><input type='text' name='m3' id='m3' /></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Add">
			</td>
		</tr>
	</table>
	</form>

              <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <script src="js/counterUp/jquery.counterup.min.js"></script>
        <script src="js/amcharts/amcharts.js"></script>
        <script src="js/amcharts/serial.js"></script>
        <script src="js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js/amcharts/themes/light.js"></script>
        <script src="js/toastr/toastr.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Welcome to Student Result Anlysis System!");

            });
        </script>
    </body>
</html>

