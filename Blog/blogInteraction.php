<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );
session_start();
$tempUser = $_SESSION['user_id'];
$currentBlog = $_SESSION[ "post_id" ];
$tempurl = $_SESSION["post_url"];
// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
header( "location: ../Login/login.html" );
exit;
}


include "../Config/config.php";
if(isset($_POST['submitButton'])){
$tempcommenterName = $_POST["commenterName"];
$temptext = $_POST['commentBox'];

$sql = "INSERT INTO comments (commenterName, text, user_id, blog_id) VALUES ('$tempcommenterName', '$temptext', '$tempUser', '$currentBlog')"; 
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
	header("location: $tempurl");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
	mysqli_close($link);
}
// Close connection



if(isset($_POST['likeButton'])){
$sql = "INSERT INTO likes (id_user, id_blog) VALUES ('$tempUser', '$currentBlog')"; 
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
	header("location: $tempurl");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}

?>