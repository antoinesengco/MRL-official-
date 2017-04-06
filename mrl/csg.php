<?php SESSION_START();
		if (!isset($_SESSION['EMP_ID'])) {
			header("location: index.php");
		}

?>
<?php
	include('dbinfo.inc.php');
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
                    <li  class="active">
                        <a href="csg.php"><i class="fa fa-fw fa-table"></i> Semesters</a>
                    </li>
                    <li>
                        <a href="sets.php"><i class="fa fa-fw fa-wrench"></i> Students </a>
                    </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <h1>Semester Tables</h1>
                <p>This is Tech-Voc Online Grading.</p>
                <p>You Create your Students Account</p>
                <p>You can Update, Drop, or Delete a Students.</p>
                <p>This website is user-friendly. its easy to use.</p>

        <form post="" method="post">
        <label>Subject Name:</label>
            <input type="text" name="s1_name" required/><br>
        <label>Subject Code</label>
            <input type="text" name="s1_code" required/><br>
        <label>Subject Descriptions</label>
            <input type="text" name="s1_desc" required/><br>
        <label>Subject Units</label>
            <input type="text" name="s1_units" required/><br>
            <input type="submit" name="Submit">
        </form>

        <?php

        if(isset($_POST['Submit'])) {

            $c = oci_connect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
            $s = oci_parse($c, 'INSERT INTO sem1 (id, s1_name, s1_code, s1_desc, s1_units) 
            VALUES (sem1_sequence.nextval,:s1_name, :s1_code, :s1_desc, :s1_units)');

            oci_bind_by_name($s, ":s1_name" , $_POST['s1_name']);
            oci_bind_by_name($s, ":s1_code" , $_POST['s1_code']);
            oci_bind_by_name($s, ":s1_desc" , $_POST['s1_desc']);
            oci_bind_by_name($s, ":s1_units" , $_POST['s1_units']);

            
            oci_execute($s);

            echo "<script>alert('Registration Successful!')</script>";

            //echo "<script>alert('Registration Unsuccessful!')</script>";


            
        }

        ?>

        <form method="post" action="#" method="post">
        <label>Subject Name:</label>
            <input type="text" name="s2_name" required/><br>
        <label>Subject Code</label>
            <input type="text" name="s2_code" required/><br>
        <label>Subject Descriptions</label>
            <input type="text" name="s2_desc" required/><br>
        <label>Subject Units</label>
            <input type="text" name="s2_units" required/><br>
            <input type="submit" name="Submit2">
        </form>

        <?php

        if(isset($_POST['Submit2'])) {
            echo "<script>console.log('test')</script>";
            $c = oci_connect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
            $s = oci_parse($c, 'INSERT INTO sem2 (id, s2_name, s2_code, s2_desc, s2_units) 
            VALUES (sem2_sequence.nextval, :s2_name, :s2_code, :s2_desc, :s2_units)');

            oci_bind_by_name($s, ":s2_name" , $_POST['s2_name']);
            oci_bind_by_name($s, ":s2_code" , $_POST['s2_code']);
            oci_bind_by_name($s, ":s2_desc" , $_POST['s2_desc']);
            oci_bind_by_name($s, ":s2_units" , $_POST['s2_units']);

            if ($s){
                $result = oci_execute($s);

                if ($result){
                    echo "<script>alert('Subject Added (Sem 2) Successful!')</script>";
                }else{
                    echo "<script>alert('Subject failed to add (Sem 2)!')</script>";
                }    
            }else{
                echo "<script>alert('Parsing unsucessful')</script>";
            }

            

            

            //echo "<script>alert('Registration Unsuccessful!')</script>";
            
        }

        ?>

        <form post="" method="post">
        <label>Subject Name:</label>
            <input type="text" name="s3_name" required/><br>
        <label>Subject Code</label>
            <input type="text" name="s3_code" required/><br>
        <label>Subject Descriptions</label>
            <input type="text" name="s3_desc" required/><br>
        <label>Subject Units</label>
            <input type="text" name="s3_units" required/><br>
            <input type="submit" name="Submit3">
        </form>

        <?php

        if(isset($_POST['Submit3'])) {

            $c = oci_connect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
            $s = oci_parse($c, 'INSERT INTO sem3 (id, s3_name, s3_code, s3_desc, s3_units) 
            VALUES (sem3_sequence.nextval, :s3_name, :s3_code, :s3_desc, :s3_units)');

            oci_bind_by_name($s, ":s3_name" , $_POST['s3_name']);
            oci_bind_by_name($s, ":s3_code" , $_POST['s3_code']);
            oci_bind_by_name($s, ":s3_desc" , $_POST['s3_desc']);
            oci_bind_by_name($s, ":s3_units" , $_POST['s3_units']);

            
           
            if ($s){
                $result = oci_execute($s);

                if ($result){
                    echo "<script>alert('Subject Added (Sem 3) Successful!')</script>";
                }else{
                    echo "<script>alert('Subject failed to add (Sem 3)!')</script>";
                }    
            }else{
                echo "<script>alert('Parsing unsucessful')</script>";
            } //echo "<script>alert('Registration Unsuccessful!')</script>";
            
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

