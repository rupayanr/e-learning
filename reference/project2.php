<html>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="hamburger.css" />
	<body>
		
				
				<div class="topnav">
				  <a href="#home" class="active">Logo</a>
				  <div id="myLinks">
					<a href="#news">News</a>
					<a href="#contact">Contact</a>
					<a href="#about">About</a>
				  </div>
				  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
					<i class="fa fa-bars"></i>
				  </a>
				</div>
				<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<script>
		function myFunction() {
		  var x = document.getElementById("myLinks");
		  if (x.style.display === "block") {
			x.style.display = "none";
		  } else {
			x.style.display = "block";
		  }
		}
		</script>
		<div class="tab">
			<button class="tablinks" onclick="#" id="defaultOpen">Create New Questions</button>
			<button class="tablinks" onclick="#">View Reviewed Questions</button>
			<button class="tablinks" onclick="#">View My Questions</button>
		</div>
	</body>
</html>