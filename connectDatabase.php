<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
	$username="root";
	$password="Rafa220691";
	$database="cuSocial";
	
	$mysqli = new mysqli("localhost", "$username", "$password", "$database");

	/* check DB connection */
	if (mysqli_connect_errno()) {
		echo("Connect failed: " . mysqli_connect_error());
		exit();
	}
	else{
		echo("Connection successful"); 
	}

?>
</body>
</html>