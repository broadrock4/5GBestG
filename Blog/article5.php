<?php
session_start();
$_SESSION['post_id'] = 5;
$_SESSION['post_url'] = "../Blog/article5.php";
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
		
      <h2>Wifi vs. 5G</h2>
      <h5>Posted on December 5, 2020</h5>
       <img src="../Styles/Wifi6vs5G-1080x675.png" width="300px" height="300px" alt="Blog Pic"/>
       <p>We have a general understanding how of how 5G will change the game with its unheralded speeds and connectivity capabilities. 5G technology represents a major step forward from cellular and wireless broadband options we have today. With a much faster and more reliable connection on offer, will 5G replace the need for Wi-Fi? Some private network providers are looking to 5G as the savior to their city-wide connectivity problems. Implementing a grid of interconnected base stations, next generation 5G can typically support more devices, offer higher bandwidths, and lower latency for end users. However, according to a report by MarketsandMarkets, the global Wi-Fi network is growing exponentially and will only continue to do so.  </p>
       <p> Wi-Fi data is accounting for over 50% of total IP traffic, in a market worth a staggering $33.6 billion. This does not seem like a market that is declining. The next stage of wireless broadband connection, called Wi-Fi 6, is set to offer speeds up to four times faster than current rates, as well as supporting more devices on a more robust network. This seems oddly similar to 5G does it not? Maybe it’s because the main reason that 5G will not oust Wi-Fi connectivity is the connectivity restrictions presented by chips in our Internet-enabled devices. All consumer devices rely on a Wi-Fi or 4G LTE connection. Wi-Fi also offers a more reliable and robust connection, which is important for enterprises and businesses that rely on a steady and well-supported connection. Wi-Fi is also more secure than publicly available cellular networks, an important caveat for end users, especially those enterprises that conduct business on publicly available connections.  </p>
       <p> More devices are being connected to cellular and fixed wireless networks, meaning the demand for low latency and higher bandwidths is rising. Because 5G is a shared resource, its bandwidth is shared amongst the number of devices connected. So 5G is best at hosting multiple devices and offering fast speeds. The next iteration of Wi-Fi, however, will support mesh networking. A mesh network is a network infrastructure made up of a series of interconnected nodes, all connected directly and dynamically to as many other nodes in the network. This, in effect, offers greater speeds and reliability for relatively low costs. So where will this war between Wi-Fi and 5G take us. Will we continue with both, or will one eventually outdo the other one? Only time will tell now. </p>
		
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














