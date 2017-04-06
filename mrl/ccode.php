<?php session_start();
		if (isset($_SESSION['code'])) {
			header("location: regform.php");
		}
 ?>

<?php
	include('dbinfo.inc.php');
echo <<<OED
<!DOCTYPE html>
<html>
<head>
	<title>Confirmation Code</title>
	 <link rel="stylesheet" type="text/css" href="css/ccode.css">
</head>
<body background="img/cpu.jpg">

		<div><form method="post" action="#">
			<H1 style="text-align:center; color:white;">Confirmation Code</H1>
			<input type="password" class="rounded" name="code" placeholder="Enter the Code">
			<input type="submit" class="submit" name="submit" value="GO"/> <br/><br/>
			<a style="color:white;"href="index.php"> <img style="width:25px;" src="img/ar.png"> Go back to Log-In Page. </a><br/>
		</form></div>

	
OED;


	if(isset($_POST['submit'])){
	
	$c = oci_connect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB);

		$c_code = addslashes($_POST['code']);
		$sel_c = "select * from CON_CODE where code ='".$c_code."'";
		$run_c = oci_parse($c, $sel_c);
		$ex = oci_execute($run_c);
		$a = oci_fetch_array($run_c);
		$check= oci_num_rows($run_c);
		while(($row=oci_fetch_array($run_c, OCI_ASSOC + OCI_RETURN_NULLS))!=False){
		
	}

	$tries = 0;

		if($check == 0){
			echo "<script>alert('password or email is incorrect!')</script>";
		} else {
			$_SESSION['code'] = $c_code;
			header("Location: regform.php");
		}
		
		
		

	}


echo <<<OED
</body>
</html>
OED;
?>