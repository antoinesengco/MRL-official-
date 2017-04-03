<?php SESSION_START();
		if (!isset($_SESSION['EMP_ID'])) {
			header("location: index.php");
		}
?>
<?php
	include('dbinfo.inc.php');
echo <<<EOD
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tech-Voc Online Grading</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Tech-Voc Online Grading</a>
            </div>


            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <!-- CUT
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                END CUT -->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> USER <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li  class="active">
                        <a href="csa.php"><i class="fa fa-fw fa-edit"></i> Create Students</a>
                    </li>
                    <li>
                        <a href="csg.php"><i class="fa fa-fw fa-table"></i> Semesters</a>
                    </li>
                    <li>
                        <a href="sets.php"><i class="fa fa-fw fa-wrench"></i> Settings</a>
                    </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <h1>Registration for Students</h1>

<form action="#" method="post">	
		<input  type="text" class="rounded" name="usn" placeholder="Student Number" required /><br />
		<input type="text" class="rounded" name="fname" placeholder="FirstName" required />
		<input  type="text" class="rounded" name="min" placeholder="MiddleName" required />
		<input type="text" class="rounded" name="lname" placeholder="LastName" required /><br/>
		<input  type="email" class="rounded" name="email" placeholder="Email" required /><br/>
		<input type="date" class="rounded" name="bdate"  required /><br/>
		<input type="text" class="rounded" name="course" placeholder="Course" required /><br/>
		<input type="text" class="rounded" name="sec" placeholder="Section" required /><br/>
		<select name="gender" required>
  			<option value="Select Gender" selected disabled>Select Gender</option>
  			<option value="Male">Male</option>
  			<option value="Female">Female</option>
		</select>
		<input type="date" name="hdate" placeholder="Enrolled Date" required />
		<input type="password" class="rounded" name="pass" placeholder="Password" required /><br/>
	<input type="submit" name="Submit" value="Register" required />
				</form>

EOD;
	if(!isset($_POST['Submit'])) {
			//No codes to run
		} else {
			
			$c = oci_pconnect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
			$s = oci_parse($c, 'INSERT INTO students (usn, fname, min, lname, email, bdate, course, sec, gender, hdate, pass) 
			VALUES (:usn, :fname, :min, :lname, :email, :bdate, :position, :sec, :gender, :hdate, :pass)');

			oci_bind_by_name($s, ":usn" , $_POST['usn']);
			oci_bind_by_name($s, ":fname" , $_POST['fname']);
			oci_bind_by_name($s, ":min" , $_POST['min']);
			oci_bind_by_name($s, ":lname" , $_POST['lname']);
			oci_bind_by_name($s, ":email" , $_POST['email']);
			oci_bind_by_name($s, ":bdate", $_POST['bdate']);
			oci_bind_by_name($s, ":position" , $_POST['course']);
			oci_bind_by_name($s, ":sec" , $_POST['sec']);
			oci_bind_by_name($s, ":gender" , $_POST['gender']);
			oci_bind_by_name($s, ":hdate" , $_POST['hdate']);
			oci_bind_by_name($s, ":pass", $_POST['pass']);

			oci_execute($s);

			echo "<script>alert('Registration Success!')</script>";

		} 
		echo <<<EOD

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.js"></script>
    <script src="js/plugins/morris/morris.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>






</body>
</html>
EOD;
?>