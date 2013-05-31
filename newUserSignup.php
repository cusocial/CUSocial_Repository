<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include 'password.php';
require_once('connectDatabase.php');
if(isset($_POST['submit'])){
	
	$password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
	
	//verify all pre-conditions necessary! - maybe make function for this if it gets complicated!!
	if(!empty($email) && !empty($password1) && !empty($password2) && ($password1 == $password2)){
		$hashPwd = password_hash($password1, PASSWORD_BCRYPT);
		if (password_verify($password1, $hashPwd)) {
			echo "Hash successful"; 
		} else {
			echo "Hash unsuccessful"; 
		}
		
		
		
		//Use prepared Sql statements (faster/secure!!) Read online for why!!
		if($insert_stmt = $mysqli->prepare("INSERT INTO userinfo (firstname, lastname, password, email) VALUES (?, ?, ?, ?)")){
			$insert_stmt->bind_param('ssss', $fname, $lname, $hashPwd, $email); 
			$insert_stmt->execute();
		}	
		else{
			echo "EPreparing ERROR: " . $mysqli->error;
		}
	
	} 
	else {
		header('Location: ./CUSocial.php?error=1');
	}

}
?>
</body>
</html>