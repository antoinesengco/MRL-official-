<?php session_start();
		if (isset($_SESSION['EMP_ID'])) {
			header('Location: home.php');
		} 

		if (isset($_SESSION['code'])) {
			header('Location: regform.php');
		}
?>
<?php
	include('dbinfo.inc.php');

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

            <form method="post" action="#" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="EMP_ID" id="inputEmail" class="form-control" placeholder="Emp ID / USN" required autofocus>
                <input type="password" name="PASS" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember Me!
                    </label>
                </div>
                <button name="submit" class="btn btn-lg btn-success btn-block btn-signin" type="submit">Log In</button>
            </form>
            <!-- /form -->

            <a href="#" class="forgot-password">
                Forgot the password?
            </a>

        </div>
        <!-- /card-container -->

    </div>
    <!-- /container -->


OED;

	if(isset($_POST['submit'])){
	
	// Eto yung Connect
	$c = oci_pconnect(ORA_CON_UN,ORA_CON_PW,ORA_CON_DB);

		$c_user = addslashes($_POST['EMP_ID']);
		$c_pass =addslashes($_POST['PASS']);
		$sel_c = "SELECT * from EMP_REG where EMP_ID ='".$c_user."' AND PASS='".$c_pass."'";
		$run_c = oci_parse($c, $sel_c);
		$ex = oci_execute($run_c);
		$a = oci_fetch_array($run_c);
		$check=oci_num_rows($run_c);
		echo $check;
		while(($row=oci_fetch_array($run_c, OCI_ASSOC + OCI_RETURN_NULLS))!=False){
		
	}
		if($check == 0){
			echo "<script>alert('password or email is incorrect!')</script>";
		}else{
			$_SESSION['EMP_ID'] = $c_user;
			header("Location: home.php");
		}
		
		

	}

echo <<<OED
</body>
</html>
OED;
?>