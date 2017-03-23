<?php session_start();
	if (!isset($_SESSION['code'])) {
		header("Location: ccode.php");
	} elseif (!isset($_SESSION['code'])) {
		header("Location: index.php");
	}
 ?>
<?php
	include('dbinfo.inc.php');
echo <<<EOD
<!DOCTYPE html>
<html>
<head>
	<title>Online Registration</title>
	<link href="css/reg.css" rel="stylesheet" type="text/css">
</head>
<body>
				
	 
<div>
<h2>Sign up New Account</h2>
	<form action="#" method="post">

	
		<input style="width:450px; margin-left:170px;" type="text" class="rounded" name="emp_id" placeholder="Employee ID" required /><br />
		<input type="text" class="rounded" name="fname" placeholder="FirstName" required />
		<input style="width:50px;" type="text" class="rounded" name="min" placeholder="MiddleName" required />
		<input type="text" class="rounded" name="lname" placeholder="LastName" required /><br/>
		<input style="width:450px; margin-left:170px;" type="email" class="rounded" name="email" placeholder="Email" required /><br/>
		<input type="date" class="rounded" name="bdate"  required /><br/>
		<input type="text" class="rounded" name="position" placeholder="Position" required /><br/>
		<input type="password" class="rounded" name="pass" placeholder="Password" required /><br/>

	<input type="checkbox" value="accept" required /> I have read and understand this agreement<br/><br/>
	<input type="submit" name="Submit" value="Register"/>
				</form>

					<a href="logout.php">Go Back to SignIn</a>

EOD;
	if(!isset($_POST['Submit'])) {
			//No codes to run
		} else {
			
			$c = oci_pconnect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);
			$s = oci_parse($c, 'INSERT INTO EMP_TAB (emp_id, fname, min, lname, email, bdate, position, pass) 
			VALUES (:emp_id, :fname, :min, :lname, :email, :bdate, :position, :pass)');

			oci_bind_by_name($s, ":emp_id" , $_POST['emp_id']);
			oci_bind_by_name($s, ":fname" , $_POST['fname']);
			oci_bind_by_name($s, ":min" , $_POST['min']);
			oci_bind_by_name($s, ":lname" , $_POST['lname']);
			oci_bind_by_name($s, ":email" , $_POST['email']);
			oci_bind_by_name($s, ":bdate", $_POST['bdate']);
			oci_bind_by_name($s, ":position" , $_POST['position']);
			oci_bind_by_name($s, ":pass", $_POST['pass']);

			oci_execute($s);

			echo "<script>alert('Registration Success!')</script>";

		} 

echo <<<EOD
</body>
</html>
EOD;
?>