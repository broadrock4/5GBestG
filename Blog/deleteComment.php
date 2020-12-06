<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
session_start();
$tempurl = $_SESSION["post_url"];
// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
header( "location: ../Login/login.html" );
exit;
}
include "../Config/config.php";

$link = mysqli_connect( $hostname, $username, $password, $database );
if ( !$link ) {
  print "Error - Cannot connect to MYSQL";
  exit;
}

if ( isset( $_GET[ 'delete' ] ) ) {
  $sql = "DELETE FROM comments WHERE comment_id ={$_GET['delete']} LIMIT 1";
  $result = mysqli_query( $link, $sql );
  if ( !$result ) {
    $error = mysqli_error();
    print "<p>" . $error . "</p>";
    exit;
  } else {
    echo( "comment deleted" );
    header( "location: $tempurl" );
  }

  mysqli_close( $link );
}
// Close connection


?>