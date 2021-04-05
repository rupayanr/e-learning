<?php
$con=mysqli_connect("localhost","root","","trainer");
if (mysqli_connect_errno($con))
{
	echo "failed to establish connection: ".mysqli_connect_error();
}
else
{
	$query="select * from question_generation_details where status='Initiated'";
	$result=mysqli_query($con,$query); 
		
echo "<html>
	<style>
	table{
		padding-top: 0px;
		width: 70%;
		height: 155px;
		border-color: white;
		margin-left: 25%;
		margin-right: 25%
	}
	th{
		background-color: black;
		color: white;
		font-weight: bold;
		font-size: 20px;
		height: 65px;
	}
	h2{
		font-weight: bold;
		text-align: justify;
		margin-left: 22%;
	}
	td{
		background-color: white;
		text-align: center;
	}
	</style>
	<body>
	<h2>Create New Questions</h2>
		<form method=POST>
			<table border=1 id='Table1'><tr>
				<th>Select</th><th>Question Id</th><th>Course Name</th><th>Reviewer Name</th></tr>";
				$count=1;
				while($row=mysqli_fetch_assoc($result))
				{
					$qid=$row['question_id'];
					$qn=$row['course_id'];
					echo "<tr><td>";
					echo "<div id=se>";
					$id=$row['course_id'];
					$query1="select course_name from course_details where course_id=$id";
					$result1=mysqli_query($con,$query1);
					$row2=mysqli_fetch_array($result1);
					$course_name=$row2[0];
					$name=$row['reviewer_email'];
					$x=strpos("$name","@");
					$y=substr("$name",0,$x);
					echo "<input type=radio name='select' onclick='display()' id=$count value='$qid~$course_name~$y' required></td><td>";
					echo "</div>";
					printf("%s",$row['question_id']);
					echo "</td><td>";
					printf("%s",$row2[0]);
					echo "</td><td>";
					echo "$y</td></tr>";
					$count = $count + 1;
				}
					
			echo "</table>";
			echo "<input type=submit id='btnGet' name='submit1' value='Create Question' />";
		echo "</form>
	</body>
</html>";
}
if(isset($_POST['submit1']))
{
$answer=$_POST["select"];
$_SESSION['answer']=$answer;


}
/*echo"<script>
function display(){
var answer=document.getElementById('se')
var answer1;
if (document.getElementById(1).checked){
	answer1=document.getElementById(1).value;
}
if (document.getElementById(2).checked){
	answer1=document.getElementById(2).value;
}
if (document.getElementById(3).checked){
	answer1=document.getElementById(3).value;
}
if (document.getElementById(4).checked){
	answer1=document.getElementById(4)).value;
}
if (document.getElementById(5).checked){
	answer1=document.getElementById(5).value;
}
document.writeln(answer1);}
 </script>"*/

/*echo "<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'></script>
 <script type='text/javascript'>
    $(function () {
      
       $('#btnGet').click(function () {

             var message2 = '';
			 var message1 ='';
			 var message3='';
 
             $('#Table1 input[type=radio]:checked').each(function () {
                 var row = $(this).closest('tr')[0];
                 message1 = row.cells[1].innerHTML;
                 message2 =  row.cells[2].innerHTML;
                 message3 =  row.cells[3].innerHTML;
             });
				alert(message1);
			
            
			
         });
     });
	
</script>";
 echo "<script>document.writeln(message1);</script>";*/
			

?>