<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
session_start();
$id = $_SESSION[ 'user_id' ];

include "../Config/config.php";

if ( isset( $_POST[ 'but_upload' ] ) ) {

  $name = $_FILES[ 'file' ][ 'name' ];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename( $_FILES[ "file" ][ "name" ] );

  // Select file type
  $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );

  // Valid file extensions
  $extensions_arr = array( "jpg", "jpeg", "png", "gif" );

  // Check extension
  if ( in_array( $imageFileType, $extensions_arr ) ) {

    // Insert record
	  $sql = "UPDATE users SET user_pic = '$name' WHERE user_id='$id'";
    mysqli_query( $link, $sql );

    // Upload file
    move_uploaded_file( $_FILES[ 'file' ][ 'tmp_name' ], $target_dir . $name );
header("location: userProfile.php");
  }
mysqli_close($link);
}

if (isset($_POST["submitBio"])){
	$temptext = $_POST['editBio'];

$sql = "UPDATE users SET user_bio = '$temptext' WHERE user_id = '$id'";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
	header("location: userProfile.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
	mysqli_close($link);
}


?>