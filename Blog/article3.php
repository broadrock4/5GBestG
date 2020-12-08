<?php
session_start();
   $_SESSION['post_id'] = 3;
$_SESSION['post_url'] = "../Blog/article3.php";
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
              <a href="../About_Us/about_us.php">About</a>
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
		
      <h2>What is 5G</h2>
      <h5>Posted on December 5, 2020</h5>
       <img src="../Styles/the-internet-4899254_1920.jpg" width="300px" height="300px" alt="Blog Pic"/>
       <p>You hear about 5G networks all the time in multiple different advertisements. Network companies such as T-Mobile, Verizon, and AT&amp;T have advertised devices that have 5G capabilities, but what is 5G exactly? Well 5G, abbreviated version of 5th Generation, is the 5th generation mobile network, which is a new global wireless standard following 4G. 5G is designed to connect virtually everyone and everything together, mainly machines, objects and devices. The wireless technology for 5G is expected to deliver increased speeds, low latency, added reliability, a huge network capacity, more availability, and a more uniform experience to more users. With all these new editions towards performance and efficiency, the 5G network is an absolute game changer. e power lines or outlets regardless whether the electricity is switched on or not. </p>
       <p>Now you might be wondering who owns this shiny new wireless technology, and the answer is simple. Nobody. With that being said, there are several companies that are contributing to the creation and implementation of 5G. The 3rd Generation Partnership Project (3GPP) is a number of organizations that develop protocols for the 5G network. 5G is making its way around the United States, but on the global level, it is not as available as one might think. Global 5G population coverage was around 5 percent at the end of 2019, with most of that coming from countries such as the United States, China, South Korea and Switzerland.  </p>
       <p> The 5G network is like 4G LTE as it operates based on the same mobile networking principles. The new 5G NR (New Radio)  delivers a much higher degree of flexibility and scalability. 5G delivers faster and better mobile broadband services compared to 4G LTE. Many people think that 5G, will be crucial for autonomous vehicles to communicate with each other and read live map and traffic data. Mobile gamers would notice less latency when playing their favorite games. Videos watched on mobile devices should be basically instantaneous, with no loading or buffering. Facetime or any other video calling service should be crystal clear. Fitness devices such as watches or bands will monitor health in real time, maybe even alerting doctors when emergencies arise. All in all, 5G can and will change how we live our everyday lives. </p>
		
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
		 <a href="../About_Us/about_us.php">About</a>
	</footer>
  </body>
</html>















