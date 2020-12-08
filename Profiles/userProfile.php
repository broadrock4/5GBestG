<?php
session_start();
$tempuser = $_SESSION[ 'user_id' ];

// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
header( "location: ../Login/login.html" );
exit;
}
?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset ="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="../Styles/5GBestG.css">
</head>
    </head>
  <body>
<script type="text/javascript" color="#4eacea,#c1d8ac,#ebe1a9" opacity="1.0" zIndex="-2" count="120" src="//cdn.bootcss.com/canvas-nest.js/1.0.0/canvas-nest.min.js"></script>
    <header>
      <nav>
        <!--Logo for website -->
        <img class="logo" src="../Styles/Logo.png" alt="Logo"/>
        <hr>

        <!-- Navigation Bar -->
         <div class="nav">
          <a class="active"
          href="../Home/home.html">Home</a>
             <a href="../About_Us/about_us.php">About Us</a>
            <a href="../Contact_US/contact_us.html">Contact Us</a>
            <a href="../Profiles/userProfile.php">myProfile</a>
			<a href="../Login/login.html">Login</a>
			<!-- This link will have php that is only visible if viewer is an Admin -->
            <div class="search-container">
              <form action="../Search/search.php" method="post">
                <input type="text"
          placeholder="Search.." name="search">
                <input
          type="submit" name="searchSubmit" value="Submit"/>
              </form>
            </div>
          </div>




<div class="category-menu">

  <div class="blogroll">
  <p>Blogroll</p>
 <a href="../Blog/article.php">Blog 1</a>
  <a href="../Blog/article2.php">Blog 2</a>
  <a href="../Blog/article3.php">Blog 3</a>
  <a href="../Blog/article4.php">Blog 4</a>
	  <a href="../Blog/article5.php">Blog 5</a>
</div>
		  </div>
      </nav>
    </header>
      
    <?php
   include "../Config/config.php";
    $sql = "SELECT user_pic FROM users where user_id = '$tempuser'";
    $result = mysqli_query( $link, $sql );
    $row = mysqli_fetch_array( $result );

    $image = $row[ 'user_pic' ];
    $image_src = "../Profiles/uploads/" . $image;
    mysqli_close( $link );

    ?>
<div class= "container-grid">
    <div class="col-1"> 
		<img src='<?php echo($image_src);  ?>' alt="User Profile Pic" >
    	<form method="post" action="upload.php" enctype='multipart/form-data'>
        	<input type='file' name='file' />
			</br>
        	<input type='submit' value='Upload' name='but_upload'>
   		</form>
    </div>
    <div class="col-2">
               <h2> <?PHP echo($_SESSION["username"]) ?></h2>
               <?php
               include( "../Config/config.php" );
               $sql = "SELECT user_bio FROM users WHERE user_id = '$tempuser'";
               $result = mysqli_query( $link, $sql );
               if ( !$result ) {
                 $error = mysqli_error();
                 print "<p>" . $error . "</p>";
                 exit;
               }
               while ( $data = mysqli_fetch_assoc( $result ) ) {

                 echo( "<div>" . $data[ "user_bio" ] . "</div>" );
               }
               mysqli_close( $link );
               ?>
               <a href="editProfile.php">Edit Bio</a> </div>
  </div>
			   <div class="likes">
    <h3> Like History </h3>
    <?php
    include "../Config/config.php";
 $query = "SELECT  blog_post.* FROM likes JOIN blog_post ON blog_post.post_id = likes.id_blog WHERE id_user = '$tempuser'";
 $result = mysqli_query( $link, $query );
        if ( !$result ) {
          $error = mysqli_error();
          print "<p>" . $error . "</p>";
          exit;
		}
        while ( $data = mysqli_fetch_assoc( $result ) ) {
			$url = $data["post_url"];
            echo( "<div class='show_likes'> <img src='../Styles/like.jpg'/>" . "   " . $data [ "title" ] . "         " . " <a href='$url' ]> $url </a> "  . "</div>" );
         
        }
        mysqli_close( $link );

    ?>
  </div>

    <footer class="profileFooter">
 		 <a href="../Contact_US/contact_us.html">Contact Us</a>
 		 <a href="../About_Us/about_us.php">About Us</a>
 	</footer>


  </body>
</html>
