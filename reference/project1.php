<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<header class="h2">
	<h1 class=learning >E-LEARNING</h1>
	</header>
		<center>
			<div class=form>
			<form method="POST" >
				<table>
					<tr class="login" height="0">
						<td></td><td><h2 style="font-size: 40px">Login</h2></td>
					</tr>
					<tr height="30" width="200">
						<td style="text-align:right" >Email&nbsp&nbsp&nbsp&nbsp</td>
						<td><input type=email id=mail name=mail size=27px placeholder="Enter Email Id" required></input></td>
					</tr>
					<tr height="30" width="200">
						<td style="text-align:right" >Password&nbsp&nbsp&nbsp&nbsp</td> 
						<td><input type=password id=pwd name=pwd size=27px placeholder="Enter Password" required /></td>
					</tr>
					<tr>
						<td></td><td><input type="submit" value="Login" name="submit" id="submit" />&nbsp&nbsp&nbsp&nbsp&nbsp;&nbsp
						<input type="reset" value="Reset" name="Reset" id="Reset" /></td>
					</tr>
				</table>
			</form>
			</div>
		</center>
	</body>
</html>

<?php
if(isset($_POST['submit']))
{
$mail=$_POST['mail'];
$password=$_POST['pwd'];
$con=mysqli_connect("localhost","root","","trainer");
if (mysqli_connect_errno($con))
{
	echo "failed to establish connection: ".mysqli_connect_error();
}
else
{
	$query1="select trainer_email from trainer_details where trainer_email='$mail'";
	$query2="select password from trainer_details where trainer_email='$mail'";
	$result1 = mysqli_query($con,$query1);
	$result2 = mysqli_query($con,$query2);
	if($row1=mysqli_fetch_assoc($result1))
	{
		if($row= mysqli_fetch_assoc($result2))
		{
			$pwd = $row['password'];
			if("$password" == "$pwd")
			{
				header('location:project2.php');
			}
			else
			{
				echo '<script>alert("please enter correct password!")</script>';
			}
		}
		else
		{
			echo '<script>alert("please enter correct password!")</script>';
		}
	}
	else
	{
		echo '<script>alert("You are not authorized to login as Admin!")</script>';
	}
}
}
?>