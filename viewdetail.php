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
		<?php
		session_start();
include("DB.php");
?>

	<?php
	session_start();
	?>
        <div class="main-wrapper">
    <nav class="navbar top-navbar bg-white box-shadow">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="navbar-header no-padding">
                                          <a class="navbar-brand" href="dashboard.html">
                                              Student Result | Teacher
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
                                              <li><a href="viewdetail.php"><i class="fa fa-bars"></i> <span>View Details</span></a></li>
                                              <li><a href="viewfinal.php"><i class="fa fa fa-server"></i> <span>View Marks</span></a></li>

                                          </ul>
                                      </li>
    <li class="has-children">
                                              
                                          <ul class="child-nav">
                                              <li><a href="viewattend1.php"><i class="fa fa-bars"></i> <span>View Attendance</a></li>
                                              <li><a href="viewschedule.php"><i class="fa fa fa-server"></i> <span>View Schedule</a></li>
                                          </ul>
                                      </li>
         
  <li class="has-children">
                                          <li><a href="change-password.php"><i class="fa fa fa-server"></i> <span> User Change Password</span></a></li>

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
							<table border='2' cellspacing='10' cellpadding='10'>
                                <?php
								
								$ma = $_SESSION['mail'];
								$q = "select * from student where email='$ma'";
								$res = mysqli_query($con,$q);
								if($r=mysqli_fetch_assoc($res))
								{
									echo "<tr>";
									
									echo "<td>Name</td><td>".$r['name']."</td></tr>";
									echo "<td>gender</td><td>".$r['gender']."</td></tr>";
									echo "<td>Address</td><td>".$r['address']."</td></tr>";
									echo "<td>Contact</td><td>".$r['contact']."</td></tr>";
									echo "<td>Email</td><td>".$r['email']."</td></tr>";
									echo "<td>Parent Name</td><td>".$r['parent_name']."</td></tr>";
									echo "<td>Parent Phone</td><td>".$r['parent_ph']."</td></tr>";
									echo "<td>Branch</td><td>".$r['branch']."</td></tr>";
									echo "<td>Roll No</td><td>".$r['rollno']."</td></tr>";	
									echo "<td>User Name</td><td>".$r['username']."</td></tr>";
									echo "<td>Password</td><td>".$r['password']."</td></tr>";
									
									
									
									}

	?>
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

