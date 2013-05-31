<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<form action="signup_process.php" method="post" >
    <span class="fname"> 
      <label for="firstname">First Name:</label><input name="fname" type="text"/><br />
     </span>
    <span class="lname"> 
      <label for="lastname">Last Name:</label><input name="lname"  type="text" /><br />
    </span>
    <span class="mail">
      <label for="emailaddress">Email:</label><input name="email" type="text"  /><br />
    </span>
    <span class="uname"> 
      <label for="username">Username:</label><input name="username"  type="text"/><br />
     </span>
     <span class="pass1"> 
      <label for="password1">Password:</label><input name="password1"  type="password" /><br />
     </span>
     <span class="pass2"> 
      <label for="password2">Password (retype):</label><input name="password2"  type="password" /><br />
     </span>
     <input type="submit" value="Sign Up" name="submit" class="submit" />

</form>
 
<script type="text/javascript">
</script>
<?php

	include 'password.php';
	$username="root";
	$password="Rafa220691";
	$database="cuSocial";
	
	$con = mysql_connect("localhost",$username,$password);
	
	// Check connection
	/*if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}*/

	$db_selected  = mysql_select_db($database) or die("Unable to select database");
	var_dump($db_selected);
	
	$password2 = "abc123"; 
	$hash = password_hash($password2, PASSWORD_BCRYPT);

	if (password_verify($password2, $hash)) {
		echo "Hash successful"; 
	} else {
		echo "Hash unsuccessful"; 
	}
	
	$query = "INSERT INTO userinfo VALUES('Aditya', '$hash', 21, 'Male', 'adityarajasekaran@gmail.com')";
	$result = mysql_query($query);
	
	// if successfully insert data into database, displays message "Successful". 
	if($result){
		echo "Successful";
		echo "<BR>";
	}	
	else {
		echo "ERROR " . mysql_error($con);
	}

	
	
	mysql_close();
	
	$age = 21; 
		
	//echo($firstName." ".$lastName); 
	//.firstname.=lastName -- same as a += kind of thing for strings!!
	define("PI", 3.14);
	gettype($age); //get type of variable in php. 
	settype($age, "double"); 
	isset($age); //check if variable age exists - returns nothing for false, 1 for true - IMP!!!!!
	$age ++;
	unset($age); //destroy variable
	//"$name" takes value of variable, single quotes take thingfsh at literal value. Single quotes processing faster!!
	//Imp: a==b (Integer 5 = string b) but a===b (identical, type+value) 
	//
	
	//echo("<h1>Sabika</h1>");
	
	$cars=array("Volvo","BMW","Toyota");
	$arrlength=count($cars);

	for($x=0;$x<$arrlength;$x++)
	  {
		  echo $cars[$x];
		  echo "<br>";
	  }
	  sort($cars);
	  //Associative arrays in php. 	  
	  $age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
	  $age['Peter']="35";
	  
	  foreach($age as $x=>$x_value)
	  {
		  echo "Key=" . $x . ", Value=" . $x_value;
		  echo "<br>";
	  }

?>
</body>
</html>