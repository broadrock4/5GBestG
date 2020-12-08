<?php
session_start();
$_SESSION['post_id'] = 4;
$_SESSION['post_url'] = "../Blog/article4.php";
$tempid = $_SESSION["user_id"];
 ?>
 
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog Post Page</title>
	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="../Styles/5GBestG.css"/>
</head>

  <body>
<script type="text/javascript" color="#4eacea,#c1d8ac,#ebe1a9" opacity="1.0" zIndex="-2" count="120" src="//cdn.bootcss.com/canvas-nest.js/1.0.0/canvas-nest.min.js"></script>
    <header>
      <nav>
        <!--Logo for website -->
        <img src="../Styles/Logo.png" class="logo" alt="The Logo for our webpage"/>
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
	  
    <div class="Post">	
		
      <h2>5G and IoT</h2>
      <h5>Posted on December 6, 2020</h5>
       <img src="../Styles/IoT.jpg" width="300px" height="300px" alt="Blog Pic"/>
       <p>The internet of things has been booming recently and can expect a bigger boom from 5G cellular technology as it becomes more available and as commercial services catch up with enhanced standards that are already exist. At this point you are either agreeing with me or wondering what the “Internet of Things” is. The Internet of Things (IoT) refers to the billions of physical devices around the world that are now connected to the internet, all collecting and sharing data. Due to the emergence of cheap computer chips and the easily accessible wireless networks, it’s possible to turn almost anything into a part of IoT.  </p>
       <p> Connecting various objects and adding sensors to them adds more digital intelligence to devices that we did not even know we needed. These sensors add real-time data to things that do not need human intervention. Now that we know what IoT consists of, we can see that 5G will increase the overall bandwidth and allow massive amount of IoT devices to connect to each other. Bill Menezes, senior principal analyst at research firm Gartner states that “The 5G technology’s ultra-reliability comes from its ability to provide a stated quality of service or “real-time” communication vs. the best-efforts data delivery of Ethernet-based technologies such as Wi-Fi.” He also states that “5G has a theoretical latency of less that one millisecond in later releases as opposed to 20 to 40 milliseconds typical in current generation Wi-Fi deployments. Menezes also goes on to say that the automotive, manufacturing, construction, and natural resources sectors such as mining and oil and gas are among the industries with 5G opportunities for IoT. However, he says that 5G is not the best choice for all IoT networks because organizations will continue to use a variety of connectivity including Wi-Fi, Bluetooth, Zigbee, and 4G NB-IoT. So, all in all, it looks like 5G will impact IoT depending large part on the use case. </p>
		
		<form action="blogInteraction.php" class="articleLikeButton" method="post">
			<input type ="submit" name="likeButton" value = "like"/>
		</form>
    </div>
	  
	  <form action="blogInteraction.php" id="commentForm" class="commentArea" method="post">
		  </br>
  Name: <input type="text" required name="commenterName"/> 
<br>
<textarea required placeholder="Enter comment here..." rows="8" cols="75" name="commentBox">
</textarea>
		  <input type="submit" id="submitButton" name="submitButton" value="Submit Comment"/>
		  
		</form>
	  
	  <div>
        <?php
        include "../Config/config.php";
        $blogID = $_SESSION[ 'post_id' ];


        $query = "SELECT admin FROM users WHERE user_id = '$tempid'";
        $result = mysqli_query( $link, $query );
        if ( !$result ) {
          $error = mysqli_error();
          print "<p>" . $error . "</p>";
          exit;
        }
        $row = mysqli_fetch_row( $result );
        $role = $row[ 0 ];


        $sql = "SELECT comment_id, commenterName, text FROM comments WHERE blog_id = '$blogID'";
        $result2 = mysqli_query( $link, $sql );
        if ( !$result2 ) {
          $error = mysqli_error();
          print "<p>" . $error . "</p>";
          exit;
        }

        while ( $data = mysqli_fetch_assoc( $result2 ) ) {
          $commentID = $data[ "comment_id" ];
          if ( $role == 1 ) {
            echo( "<div class='show_comments'>" . $data[ "commenterName" ] . "</br>" . $data[ "text" ] . "</br> <a href ='deleteComment.php?delete=$commentID'>Delete</a>" . "</div>" );
          } else {
            echo( "<div class='show_comments'>" . $data[ "commenterName" ] . "</br>" . $data[ "text" ] . "</div>" );
          }
        }
        mysqli_close( $link );


        ?>
	  
	  </div>
	  	
	 <footer class="AboutFooter">
		 <a href="../Contact_US/contact_us.html">Contact Us</a>
		 <a href="../About_Us/about_us.php">About Us</a>
	</footer>
  </body>
</html>














