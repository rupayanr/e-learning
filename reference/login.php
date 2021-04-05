<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  div{
	font-family: sans-serif;
   background-color:deepskyblue;
   padding: 10px;
   height:70px;
  }
  body{
  background-color:aliceblue;
  }
  ::placeholder{
  color: lightgrey;
 }
table{
    border-collapse: separate;
    border-spacing: 0 1em;
}
input[type="submit"]
		{
			background-color:forestgreen;
			font-weight: bold;
			font-size: 15px;
			color: white;
			border-radius: 7px;
			height: 30px;
			width: 80px;			
			cursor: pointer;
		}
input[type="reset"]
		{
			background-color:red;
			font-weight: bold;
			font-size: 20px;
			color: white;
			border-radius: 7px;
			height: 30px;
			width:80px;			
			cursor: pointer;
			margin-left:20px;
		}
		
  </style>
  </head>
 <body>
<div>
<h1>E-LEARNING</h1>
</div>

<table align='center'>
<form  action='#'  method='post'>
<tr><td></td><td><h1 align>Login</h1></td></tr><br>
<tr><td>Email</td><td><input type='email' name='useremail' size=27px placeholder='Enter Email Id' required /></td><td><br>
<tr><td>Password</td><td><input type='password' name='password'size=27px placeholder='Enter Password' required /></td><td><br>
<tr><td></td><td><input type='submit' name='submit' value='Login'><input type='reset' name='reset' value='Reset'></td></tr></br>
</form>
</table>
</body>
</html>
<?php
session_start();
if(isset($_POST['submit'])){
$email=$_POST['useremail'];
$password=$_POST['password'];
 if (strtolower($email) == "admin_123@elearn.com") {
		if($password == "#Elearn@123"  ) {
				$_SESSION['logged_in'] = true;
				header('location:homepage.php');
		}
		else{
			echo'<script>alert("Please enter the correct password")</script>';	
		}    
  }
  else{
	echo'<script>alert("You are not authorized to login as admin!")</script>';
  }
}
?>

