<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include 'helperFunctions.php';
sec_session_start(); 
require_once("connectDatabase.php"); 
function loginCheck($mysqli) {
   // Check if all session variables are set
   if(isset($_SESSION['userId'], $_SESSION['email'], $_SESSION['loginString'])) {
     $userId = $_SESSION['userId'];
     $loginString = $_SESSION['loginString'];
     $email = $_SESSION['email'];
 
     $userBrowser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
     if ($stmt = $mysqli->prepare("SELECT password FROM userinfo WHERE userId = ? LIMIT 1")) { 
        $stmt->bind_param('i', $userId); // Bind "$user_id" to parameter.
        $stmt->execute(); // Execute the prepared query.
        $stmt->store_result();
 
        if($stmt->num_rows == 1) { // If the user exists
           $stmt->bind_result($password); // get variables from result.
           $stmt->fetch();
           $loginCheck = $password.$userBrowser;
		   //echo("check = " . $loginCheck);
		   //echo("string = " . $loginString); 
           if($loginCheck == $loginString) {
              // Logged In!!!!
              return true;
           } else {
              // Not logged in
              return false;
           }
        } else {
            // Not logged in
            return false;
        }
     } else {
        // Not logged in
        return false;
     }
   } else {
     // Not logged in
     return false;
   }
}

if(!loginCheck($mysqli))  {
	header('Location: ./CUSocial.php?error=1');
	exit();
}
?>
</body>
</html>