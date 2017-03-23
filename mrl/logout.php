
<?php
session_start();
	if(isset($_SESSION['EMP_ID'])){
		session_destroy();
		header("Location: index.php");
	}else{
		header("Location: index.php");
	}

	if (isset($_SESSION['code'])) {
		session_destroy();
		header("location: index.php");
	}else {
		header("location: index.php");
	}