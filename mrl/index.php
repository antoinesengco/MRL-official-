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

<div>
<form method="post" action="#">
	<input type="text" class="rounded" name="EMP_ID" placeholder="ID / USN" required />
	<input type="password" class="rounded" name="PASS" placeholder="Password..." required /> <br />
	<input type="submit" class="submit" name="submit" value="Enter" /><br />
</div>
<br />

<a href="ccode.php">Register(if you are a Prof)</a>
OED;

	if(isset($_POST['submit'])){
	
	// Eto yung Connect
	$c = oci_pconnect(ORA_CON_UN,ORA_CON_PW,ORA_CON_DB);

		$c_user = addslashes($_POST['EMP_ID']);
		$c_pass =addslashes($_POST['PASS']);
		$sel_c = "SELECT * from EMP_TAB where EMP_ID ='".$c_user."' AND PASS='".$c_pass."'";
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