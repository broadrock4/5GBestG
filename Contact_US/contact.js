// JavaScript Document
function chkUsername() {
  var userName = document.getElementById("usrname").value;
  if (userName.length ==0) {
    alert("Error: Username is required");
    return false
  } else {
    return true;
  }

}