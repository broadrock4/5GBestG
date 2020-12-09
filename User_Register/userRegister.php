<!DOCTYPE html>

<html lang="en" class="Html">
  <head>
    <meta charset ="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="../Styles/5GBestG.css">
</head>
    </head>
  <body>
<?php
include "../Config/config.php";

$username = "";
$password = "";
$re_enter_password = "";

$username_err = $password_err = $re_enter_password_err = "";

//processing form data when form is submitted
if($_POST["regSubmitButton"]){

	//validate username
	if(empty(trim($_POST["username"]))){
		
		$username_err = "Plese enter a username. ";
	} 
else {
    $tempUsername = $_POST[ "username" ];
    $query = "SELECT username FROM users";
    $result = mysqli_query( $link, $query );
    while ( $row = mysqli_fetch_assoc( $result ) ) {
      if ( $_POST[ "username" ] == $row[ "username" ] ) {
        $username_err = "Username already exists please enter a new username";
		  echo("Username already exists please enter a new username ");
		  echo("<a href='../User_Register/userRegister.html'> Register </a>");
      } else {
        $username = $_POST[ "username" ];
      }
    }
  }
    
    // Validate password
    if(empty(trim($_POST["pwd1"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["pwd1"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["pwd2"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["pwd2"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["pwd2"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../Login/login.html");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}

?>
	  
	  </body>
</html>
