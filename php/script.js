//script.js

//getting the form element by ID  
const form = document.getElementById('my-form');

//flag to prevent form from submitting before validations are made  
var flag = true;

//To check if script is loaded 
console.log("SCRIPT.JS IS LOADED")

form.addEventListener('submit',(e) =>{
	if (!validate()){
		alert("Please fill form accordingly!");
		e.preventDefault();
	}
	else{
		alert("Form details are valid!");
	}
})

/*function getvals(){

	var opt = $("#skills").val() || [];
	$( "p" ).html("<b>Skills selected: </b>" + opt.join(", "));
	console.log("You are in fucntion getval");	

	for ( let el of opt){
		console.log(el);
	}
	
}
$( "select" ).change( getvals );
*/

function validate(){
	
	console.log("You are in validate");

	var arr = [];

	//Fetching the values of skills select tag
	var opt = $("#skills").val() || [];
	
	//Fetching the trainer's email 
	var email = document.getElementById('trainer_email').value;
	
	//Fetching the mobile number 
	var number = document.getElementById('phone').value;
	
	//Fetching the years of experience 
	var exp = document.getElementById('exp').value;

	
	//Creating regexs to validate test()
	var email_check = /(^[a-zA-Z]+)(\.?)[a-zA-Z]+[@][elearn.com]+$/gm;

	var num_check = /^[6789]{1}\d{9}$/gm;

	var exp_check = /^([0-9]{1,2})(\.)([0-9]{0,1})$|^[0-9]{1,2}$/gm;

	//Testing using test() function and validating

	if(!email_check.test(email)){
		alert("Please enter valid email!");
		return false;
	}
	else{
		arr.push('1');

	}
	
	if(!num_check.test(number)){
		alert("Please enter a valid phone number!");
		return false;
	}
	else{
		arr.push('1');

	}
	
	if(!num_repeat(number)){
		alert("Please Enter valid phone number!")
		return false;
	}
	else{
		arr.push('1');

	}

	if(!exp_check.test(exp)){
		alert("Please enter a valid experience!");
		return false;
	}
	else{
		arr.push('1');

	}

	if(arr.length == 4){
		return true;
	}
	else{
		return false;
	}
	

}

function num_repeat(num){
	var num1 = num % 10;

	if(num1 != 0){
		var	num2 = num/num1;
		
		if(num2 == 1111111111){
			return false;
		}
		else{
			return true;
		}
	}
	else{
		return true;
	}
}

