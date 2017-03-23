<?php SESSION_START();
		if (!isset($_SESSION['EMP_ID'])) {
			header("location: index.php");
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
</head>
<body>

<ul class="ul">
  <li class="li"><a class="a active" href="#home">Home</a></li>
  <li  class="li"><a class="a" href="#news">News</a></li>
  <li  class="li"><a class="a" href="#contact">Contact</a></li>
  <li  class="li" style="float:right;"><a class="a" href="logout.php">Log Out</a></li>
</ul>



</body>
</html>