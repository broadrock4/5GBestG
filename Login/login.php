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

if ( isset( $_POST[ 'user_submit' ] ) ) {

  $username = $_POST[ 'username' ];
  $password = $_POST[ 'pwd1' ];

  if ( $username != "" && $password != "" ) {

    $sql_query = "SELECT user_id, username, password FROM users WHERE username = '$username'";
    $result = mysqli_query( $link, $sql_query );
    $row = mysqli_fetch_assoc( $result );

    if ($row['username'] != $username ) {
      echo "Username does not exist";
    } else {
      if ( $password == $row[ 'password' ] ) {
        session_start();

        // Store data in session variables
        $_SESSION[ "loggedin" ] = true;
        $_SESSION[ "user_id" ] = $row['user_id'];
        $_SESSION[ "username" ] = $username;
		  
		 header("location: ../Home/home.html");
	  }
        else {
          echo("Password is incorrect. Click link to re-signin ");
			echo("<a href='../Login/login.html'> Login </a>'");
        }
    }
  }
	 mysqli_close( $link );
}
?>
	  	  
	  </body>
</html>
