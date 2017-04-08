<?php SESSION_START();
		if (!isset($_SESSION['EMP_ID'])) {
			header("location: index.php");
		} 
?>
<?php
	include('dbinfo.inc.php');
    $c = oci_connect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
    $sel_c = "select * from emp_tab";
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php while (($row = oci_fetch_array($run_c, OCI_BOTH)) != false) {
                       echo $row[2] . "&nbsp;" . $row[4]; } ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
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
                        <a href="sets.php"><i class="fa fa-fw fa-table"></i> Students </a>
                    </li>
                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Year <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="csg.php">1st Year</a>
                            </li>
                            <li>
                                <a href="#2year.php">2nd Year</a>
                            </li>
                            <li>
                                <a href="#3year.php">3rd Year</a>
                            </li>
                            <li>
                                <a href="#4year.php">4th Year</a>
                            </li>
                        </ul>
                    <li class="active">
                        <a href="igrade.php"><i class="fa fa-fw fa-dashboard"></i> Insert Grades</a>
                    </li>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

            <form action="" method="post">
            <label>Insert USN: </label><br>
            <input type="text" name="usn"><br>
            <label>Insert Subject Code: </label><br>
            <input type="text" name="sub_code"><br>
            <label>Insert Grade: </label><br>
            <input type="text" name="grades"><br>

            <input type="submit" name="Submit">
            </form>

            <?php
                if (isset($_POST['Submit'])) {
            
            $c = oci_connect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
            $s = oci_parse($c, 'INSERT INTO grades (id, usn, sub_code, grades) 
            VALUES (grades_sequence.nextval, :usn, :sub_code, :grades)');

            oci_bind_by_name($s, ":usn" , $_POST['usn']);
            oci_bind_by_name($s, ":sub_code" , $_POST['sub_code']);
            oci_bind_by_name($s, ":grades" , $_POST['grades']);

            echo "<script>alert('Registration Successful!')</script>";
                } 


            ?>

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

