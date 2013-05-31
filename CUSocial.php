<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css">
<title>CU Social</title>
</head>

<body>
<?php include("header.php"); ?>
  <section class="container">
    <h1 align="center"><strong>Welcome to CU Social. </strong></h1>
    <h1 align="center"><strong>Connect with fellow Carleton University Students!</strong></h1>
    <p align="center">&nbsp;</p>
    <div class="login">
      <h1>Login to CU-Social</h1>
      <form action="loginScript.php" method="post" >
      
   
        <p><input type="text" name="email" value="" placeholder="Email Id"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <!-- If adding remember me option later!!
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember me on this computer
          </label>
        </p>
        !-->
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? (Doesnt yet work!) <a href="CUSocial.php">Click here to reset it</a>.</p>
    </div>
  </section>
  
<!-- Note ->  method get appends user entered data to url, so not used for sensitive data. method post for pwds etc !-->
<section class="container">
    <div class="login">
      <h1>Signup for CU-Social</h1>
      <form action="newUserSignup.php" method="post" >
      
   
        <p><input type="text" name="fname" value="" placeholder="First Name"></p>
        <p><input type="text" name="lname" value="" placeholder="Last Name"></p>
		<p><input type="text" name="email" value="" placeholder="Email"></p>
        <p><input type="password" name="password1" value="" placeholder="Password"></p>
        <p><input type="password" name="password2" value="" placeholder="Re-type Password"></p>
        <p class="submit"><input type="submit" name="submit" value="Login"></p>
      </form>
    </div>

  </section>
<!--
<h1> SIGNUP FORM!!! </h1><br /> 
<form action="newUserSignup.php" method="post" >
    <span class="fname"> <!-- If need to css style on this shit !-->  <!--
      <label for="firstname">First Name:</label><input name="fname" type="text"/><br />
    </span>
    <label for="lastname">Last Name:</label><input name="lname"  type="text" /><br />
    <label for="emailaddress">Email:</label><input name="email" type="text"  /><br />
    <label for="password1">Password:</label><input name="password1"  type="password" /><br />
    <label for="password2">Password (retype):</label><input name="password2"  type="password" /><br />
    <input type="submit" value="Sign Up" name="submit" class="submit" />
</form>
<br /><br />

<h1> LOGIN FORM (Already have CUSocial account!!) </h1><br />
<form action="loginScript.php" method="post" >
    <span class="email"> <!-- If need to css style on this shit !--> <!--
      <label for="email">Email:</label><input name="email" type="text"/><br />
    </span>
    <label for="password">Password:</label><input name="password"  type="password" /><br />
    <input type="submit" value="Sign Up" name="submit" class="submit" />
</form>
!-->


</body>
</html>