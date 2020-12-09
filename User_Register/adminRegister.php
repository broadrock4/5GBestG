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
<body class="createAccountsBody">
<?php
include "../Config/config.php";
$username = $_POST[ 'adminUsername' ];
$tempPin = $_POST[ 'adminPin' ];


if ( isset( $_POST[ 'adminsubmitButton' ] ) ) {
  $sql = "SELECT username FROM users WHERE username = '$username'";
  $data = mysqli_query( $link, $sql );
  $row = mysqli_fetch_assoc( $data );

  if ( $row[ 'username' ] != $username ) {
    echo ("Username does not exist. Click link to revalidate your account " );
	  echo("<a href='../User_Register/adminRegister.html'> Admin Validate </a>");
  } else {
    if ( $tempPin == '7359' ) {

      $tempUser = $_POST[ "adminUsername" ];

      $sql_query = "UPDATE users SET admin ='1' WHERE username = '$username'";
      if ( mysqli_query( $link, $sql_query ) ) {
        echo "Records Updated successfully. To login click the link ";
		  echo("<a href='../Login/login.html'> Login </a>");
      } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error( $link );
      }
      
    } else {
      echo( "Pin is incorrect. Click link to revalidate your account " );
	  echo("<a href='../User_Register/adminRegister.html'> Admin Validate </a>");
    }
  }
mysqli_close( $link );
}
?>
</body>
</html>
