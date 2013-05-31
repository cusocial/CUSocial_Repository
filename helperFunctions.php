<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include 'password.php';

/*Function to securely start a php sessions as opposed to a simple session_start().

It stops hackers from being able to access the session id cookie through javascript (For example in an XSS attack).
Also by using the "session_regenerate_id()" function, which regenerates the session id on every page reload, helping prevent session hijacking.
*/ 
function sec_session_start() {
        $session_name = 'sec_session_id'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
        $cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        session_start(); // Start the php session
        session_regenerate_id(true); // regenerated the session, delete the old one.     
}

function login($email, $password, $mysqli) {
    if ($stmt = $mysqli->prepare("SELECT userId, email, password FROM userinfo WHERE email = ? LIMIT 1")) {
		$stmt->bind_param('s', $email); // Bind "$email" to parameter.
        $stmt->execute(); // Execute the prepared query.
        $stmt->store_result();
        $stmt->bind_result($userId, $db_email, $db_password); // get variables from result.
        $stmt->fetch();
         
        if($stmt->num_rows == 1) { // If the user exists
		 // We check if the account is locked from too many login attempts 
		 /*
         if(checkbrute($user_id, $mysqli) == true) { 
            // Account is locked
            // Send an email to user saying their account is locked
            return false;
         } else {*/
		 
         if(password_verify($password, $db_password)) {
			  echo("Sabika exists!!"); 
			 // Check if the password in the database matches the password the user submitted. 
             // Password is correct! 
             $userBrowser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
             $userId = preg_replace("/[^0-9]+/", "", $userId); // XSS protection as we might print this value
             $_SESSION['userId'] = $userId; 
             $email = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $email); // XSS protection as we might print this value
             $_SESSION['email'] = $email;
             $_SESSION['loginString'] = $db_password.$userBrowser;
             // Login successful.
             return true;    
         } else {
            // Password is not correct
            // We record this attempt in the database
            //$now = time();
            //$mysqli->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
            return false;
         }
      //}
      } else {
         // No user exists. 
         return false;
      }
   }
}

function checkbrute($user_id, $mysqli) {
   // Get timestamp of current time
   $now = time();
   // All login attempts are counted from the past 2 hours. 
   $valid_attempts = $now - (2 * 60 * 60); 
 
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) { 
      $stmt->bind_param('i', $user_id); 
      // Execute the prepared query.
      $stmt->execute();
      $stmt->store_result();
      // If there has been more than 5 failed logins
      if($stmt->num_rows > 5) {
         return true;
      } else {
         return false;
      }
   }
}
?>
</body>
</html>