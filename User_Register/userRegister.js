// JavaScript Document 
//Event Handling Functions
function chkUsername(){
	var usName = document.getElementById("username").value;
	if (usName.length <= 3){
		alert("Error: Username is required and must be longer then 3 characters.");
		return false
	}
	else{
		return true;
	}
	
}

function chkPasswords(){
	var pass1 = document.getElementById("pwd1").value;
	var pass2 = document.getElementById("pwd2").value;
	var usName = document.getElementById("username").value;
	
	if(pass1.length==0 || pass2.length==0 || usName.length==0){
		alert("Error: Username, password and confirm password required.")
		return false;
	}
	var test = pass1.search(/[A-Z]/)
	if(test != 0){
		alert("Password Must contain at least one Capital letter.");
		return false;
	}
	if(pass1.length <= 5 || pass2.length <= 5){
		alert("Error Password must be larger then 5 characters.")
		return false
	}
	if(pass1!=pass2){
		alert("Error: Passwords must match.");
		return false;
	}
	else{
		alert("Account Created!");
		return true;
	}
}

//Dynamic Html Functions
