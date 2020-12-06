// JavaScript Document
function chkLogin(){
	var usName = document.getElementById("username").value;
	var pass = document.getElementById("pwd1").value;
	
	if(pass.length==0 || usName==0){
		alert("Error: Username, password required.")
		return false;
	}
	else{
		return true;
	}
}