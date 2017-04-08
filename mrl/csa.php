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

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">


</head>

<body">


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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>

                     <?php while (($row = oci_fetch_array($run_c, OCI_BOTH)) != false) {
                       echo $row[2] . "&nbsp;" . $row[4]; } ?> 

                       <b class="caret"></b></a>
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
                    <li  class="active">
                        <a href="csa.php"><i class="fa fa-fw fa-edit"></i> Create Students</a>
                    </li>
                    <li>
                        <a href="sets.php"><i class="fa fa-fw fa-table" aria-hidden="true"></i> Students </a>
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
                         <li >
                        <a href="igrade.php"><i class="fa fa-fw fa-dashboard"></i> Insert Grades</a>
                    </li>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                

<!-- Trigger the modal with a button -->
  <button style="margin-left:36%; margin-top:20%;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create a Students</button>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Creating Students</h4>
        </div>
        <!--  Modal Body -->
        <div class="modal-body">

    <div style =
    "margin-top: 6%;
    background-color: #BBD4E7;
    width: 450px;
    border: 25px;
    border-style: solid;
    border-color: #038BF4; 
    margin-bottom: 6%;
    margin-left: 5%;
    padding-left: 10%;
    box-shadow: 8px 8px 4px #666;
    transition: box-shadow 3.0s;
    border-radius: 25px;">
<br>
<br>
         
<form action="#" method="post"> 
<table>
<tr>
    <th><label> USN: </label></th>
    <th><input style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0; text-align:center; 
                       padding-right:6%; padding-left:6%;"
        type="text" class="rounded" name="usn" placeholder="Student Number" required /></th>
</tr>

<tr>
    <th><label> First Name: </label></th>
    <th><input style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0;  text-align:center; 
                       padding-right:6%; padding-left:6%;" 
     type="text"  name="fname" placeholder="FirstName" required /></th>
</tr>

<tr>
    <th><label> Middle Initial: </label></th>
    <th><input style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0;
                       width:70px; text-align:center;
                       padding-right:6%; padding-left:6%;"  
   type="text" name="min" placeholder="M.I" required /></th>
</tr>

<tr>
    <th><label> Last Name: </label></th>
    <th><input style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0;  text-align:center;
                       padding-right:6%; padding-left:6%;"
        type="text" name="lname" placeholder="LastName" required /></th>
</tr>

<tr>
    <th><label> Email: </label></th>
    <th><input style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0;  text-align:center;
                       padding-right:6%; padding-left:6%;"
        type="email" name="email" placeholder="Email" required /></th>
</tr>

<tr>
    <th><label> Birthdate: </label></th>
    <th><input style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0;  text-align:center;
                       padding-right:6%; padding-left:6%;"
        type="date" name="bdate"  required /></th>
</tr>

<tr>
    <th><label> Course: </label></th>
    <th><select style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0;  text-align:center;
                       padding-right:6%; padding-left:6%;"  name="course" required>
        <option value="Select Course" selected disabled>Select Course</option>
        <option value="Information Technology">Information Technology</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Business Administration">Business Administration</option>
        <option value="Accounting">Accounting</option>
    </select></th>
</tr>

<tr>
<th><label> Section: </label></th>
    <th><select style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0;  text-align:center;
                       padding-right:6%; padding-left:6%;"  name="sec" required>
        <option value="Select Gender" selected disabled>Select Section</option>
        <option value="IA">IA</option>
        <option value="IB">IB</option>
        <option value="IC">IC</option>
        <option value="CA">CA</option>
        <option value="EA">EA</option>
        <option value="IR">IR</option>
    </select></th>
</tr>

<tr>
    <th><label> Gender: </label></th>
    <th><select style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0;  text-align:center;
                       padding-right:6%; padding-left:6%;"  name="gender" required>
        <option value="Select Gender" selected disabled>Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select></th>
</tr>

<tr>
    <th><label> Enrolled Date: </label></th>
    <th><input style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0; text-align:center;
                       padding-right:6%; padding-left:6%;"
        type="date" name="edate" placeholder="Enrolled Date" required /></th>
</tr>

<tr>
    <th><label> Password: </label></th>
    <th><input style="-moz-border-radius: 10px;
                      -webkit-border-radius: 10px;
                       border-radius: 10px; outline:0; text-align:center;
                       padding-right:6%; padding-left:6%;" 
        type="password" name="pass" placeholder="Password" required /></th>
</tr>
</table><br>
<input style="-moz-border-radius: 10px;
              -webkit-border-radius: 10px;
               border-radius: 10px; outline:0; margin-bottom: 5%; margin-left:30%;" 
        type="submit" name="Submit" value="Register" required /><br>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
<!-- end of div-->
</form>
<div>
      <!-- end of modal -->
    </div>
  </div>
  
</div>



<?php
	if(!isset($_POST['Submit'])) {
			#NO CODES ....
		} else {
			
			$c = oci_connect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
			$s = oci_parse($c, 'INSERT INTO stu (id, usn, fname, min, lname, email, bdate, course, sec, gender, edate, pass) 
			VALUES (stu_users_sequence.nextval, :usn, :fname, :min, :lname, :email, :bdate, :position, :sec, :gender, :edate, :pass)');

			oci_bind_by_name($s, ":usn" , $_POST['usn']);
			oci_bind_by_name($s, ":fname" , $_POST['fname']);
			oci_bind_by_name($s, ":min" , $_POST['min']);
			oci_bind_by_name($s, ":lname" , $_POST['lname']);
			oci_bind_by_name($s, ":email" , $_POST['email']);
			oci_bind_by_name($s, ":bdate", $_POST['bdate']);
			oci_bind_by_name($s, ":position" , $_POST['course']);
			oci_bind_by_name($s, ":sec" , $_POST['sec']);
			oci_bind_by_name($s, ":gender" , $_POST['gender']);
			oci_bind_by_name($s, ":edate" , $_POST['edate']);
			oci_bind_by_name($s, ":pass", $_POST['pass']);

			oci_execute($s);

			echo "<script>alert('Registration Success!')</script>";

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

