<?php session_start();
		if (isset($_SESSION['EMP_ID'])) {
			header('Location: home.php');
		} 

		if (isset($_SESSION['USN'])) {
			header('Location: studentshomepage.php');
		}

		if (isset($_SESSION['code'])) {
			header('Location: regform.php');
		}


?>
<?php
	include('dbinfo.inc.php');

if(isset($_POST['submit'])){
	
	// Eto yung Connect
	$c = oci_connect(ORA_CON_UN,ORA_CON_PW,ORA_CON_DB);

		$query_emp = "SELECT * FROM EMP_TAB WHERE EMP_ID ='".$_POST['c_user']."' AND PASS='".$_POST['c_pass']."'";
		$parse_emp = oci_parse($c, $query_emp);
		if ($parse_emp){
			$result_emp = oci_execute($parse_emp);
			if ($result_emp){
				$counter_emp = oci_fetch_all($parse_emp, $res);
				if ($counter_emp != 0){
					$_SESSION['EMP_ID'] = $_POST['c_user'];
					header("Location: home.php");
				}else{
					$query_stu = "SELECT * FROM STU WHERE USN = '".$_POST['c_user']."' AND PASS = '".$_POST['c_pass']."'";
					$parse_stu = oci_parse($c, $query_stu);
					if ($parse_stu){
						$result_stu = oci_execute($parse_stu);
						if ($result_stu){
							$counter_stu = oci_fetch_all($parse_stu, $res1);
							if ($counter_stu != 0){
								$_SESSION['USN'] = $_POST['c_user'];
								header("Location: studentshomepage.php");
							}else{
								echo "<script>alert('Username or Password is Incorrect!')</script>";
							}
						}
					}
				}
			}
		}
	}


echo <<<OED
<!DOCTYPE html>
<html>
<head>
	<title>TECH-VOC GRADING SITE</title>
	<link href="css/des.css" rel="stylesheet" type="text/css">
</head>
<body background="img/cpu.jpg">

<div class="container">

        <div class="card card-container">
    <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->

            <img id="profile-img" class="profile-img-card" src="img/no.png" />
            <p id="profile-name" class="profile-name-card"></p>

            <form method="post" action="" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input style="text-align:center;" type="text" name="c_user" id="inputEmail" class="form-control" placeholder=" Emp ID / USN" required autofocus>
                <input style="text-align:center;" type="password" name="c_pass" id="inputPassword" class="form-control" placeholder=" Password " required>
               
                <button name="submit" class="btn btn-lg btn-success btn-block btn-signin" type="submit">Log In</button>
            </form>
            <!-- /form -->

            <a href="ccode.php" class="forgot-password">
                Register Account? (For professors only)
            </a>

        </div>
        <!-- /card-container -->

    </div>
    <!-- /container -->


OED;

	


echo <<<OED
</body>
</html>
OED;
?>