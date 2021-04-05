<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
	<style>
		body {
			font-family: 'Source Sans Pro';
			margin: 0px;
		}
		header{
			letter-Spacing: 3px;
			padding: 0.6px;
			background-color : #6ab8db;
			padding-left: 10px;
		}
		input[type="submit"]
		{
			font-weight: bold;
			font-size: 20px;
			color: white;
			border-radius: 15px;
			height: 120px;
			width: 230px;			
			cursor: pointer;
		}
		#Student{
			background-color: #03a9f4;
		}
		#Trainer{
			background-color: #2284d1;
		}
		#Admin{
			background-color: #3f51b5;
		}
		td{
			padding-bottom: 60px;
			padding-left: 80px;
			padding-right: 80px;
		}
		.button{
			padding: 80px;
		}
		h1{
			letter-spacing: 2px;
			font-weight: bold;
			font-size: 50px;
		}
		h2{
			font-size: 40px;
		}
	</style>
</head>

<body>
	<header>
		<h1>E-LEARNING</h1>
	</header>
	<div class="button">
		<form method="GET" action="#">
			<table align="center">
				<tr> 
					<td colspan="3" align="center"> <h2>Login Here</h2> </td>
				</tr>
				<tr>
					<td> <input type="submit" name="submit" value="Student" id="Student" /> </td>
					<td> <input type="submit" name="submit" value="Trainer" id="Trainer" /> </td>
					<td> <input type="submit" name="submit" value="Admin" id="Admin" /> </td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>


<?php
session_start();
if (isset ($_REQUEST['submit'])) {
	$_SESSION['role'] = $_REQUEST['submit'];
	header("Location: login.php");
}

?>