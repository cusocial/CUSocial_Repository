<? ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php 

include 'connectDatabase.php';
include 'helperFunctions.php';
sec_session_start(); 
error_reporting(E_ALL);

if(isset($_POST['submit'])){ 
	if(isset($_POST['email'], $_POST['password'])) { 
	   $email = $_POST['email'];
	   $password = $_POST['password']; 
	   if(login($email, $password, $mysqli) == true) {
		  // Login success
		  header('Location: CUSocialMember.php');
		  
	   } else {
		  // Login failed
		  header('Location: ./CUSocial.php?error=1');
	   }
	} else { 
	   // The correct POST variables were not sent to this page.
	   echo 'Invalid Request';
	}
}

?>
</body>
<? ob_flush(); ?>
</html>