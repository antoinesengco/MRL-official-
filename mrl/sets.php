<?php SESSION_START();
		if (!isset($_SESSION['EMP_ID'])) {
			header("location: index.php");
		}
?>
<?php
	include('dbinfo.inc.php');
        $c = oci_connect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
    $sel_c = "select * from stu";
    $run_c = oci_parse($c, $sel_c);
    $ex = oci_execute($run_c);
?>

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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> USER <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
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
                    <li>
                        <a href="csa.php"><i class="fa fa-fw fa-edit"></i> Create Students</a>
                    </li>
                    <li>
                        <a href="csg.php"><i class="fa fa-fw fa-table"></i> Semesters</a>
                    </li>
                    <li class="active">
                        <a href="sets.php"><i class="fa fa-fw fa-wrench"></i> Students</a>
                    </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

<h1>Students</h1>


<?php
// $conn=oci_connect("techvoc",'mrl','//localhost/XE');

// do_query($conn,'SELECT SEC, USN, FNAME, LNAME, GENDER, COURSE  FROM STU');
// function do_query($conn,$query){
// $stid= oci_parse($conn,$query);
// $r= oci_execute($stid, OCI_DEFAULT);
// print'<table style="margin-left:10%;width:50%; border-collapse: collapse; text-align:center;" border="1" >';
// print '<tr><th>&nbsp;&nbsp;Section&nbsp;&nbsp;</th><th>&nbsp;&nbsp;USN&nbsp;&nbsp;</th><th>&nbsp;&nbsp;FirstName&nbsp;&nbsp;</th><th>&nbsp;&nbsp;LastName&nbsp;&nbsp;</th><th>&nbsp;&nbsp;Gender&nbsp;&nbsp;</th><th>&nbsp;&nbsp;Course&nbsp;&nbsp;</th></tr>';
// while ($row=oci_fetch_array($stid,OCI_ASSOC + OCI_RETURN_NULLS))
// {
//   print'<tr>';
//   foreach ($row as $item){
//     print'<td>'.'&nbsp;'.'&nbsp;'.'&nbsp;'.('&nbsp;' . '&nbsp;'. $item?htmlentities($item):'&nbsp;' . '&nbsp;').'&nbsp;'.'&nbsp;'.'&nbsp;'.'</td>';
//   }
//   print'<tr>';
// }
// print '<table>';
// }
?>
            <table class="table">
              <tr>
                <th>Student Name</th>
                <th>First Semester</th> 
                <th>Second Semester</th>
                <th>Third Semester</th>
                <th>Drop Student</th>
              </tr>
              <?php 
                  while (($row = oci_fetch_array($run_c, OCI_BOTH)) != false) {
              ?>
              <tr>
                  <td><?php echo $row[2] ?></td>
                  <td><button class="btn btn-primary">Input Grade</button></td>
                  <td><button class="btn btn-primary">Input Grade</button></td>
                  <td><button class="btn btn-primary">Input Grade</button></td>
                  <td><button class="btn btn-danger">DROP</button></td>
              </tr>
              <?php } ?>
            </table>

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

