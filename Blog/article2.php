<?php
session_start();
   $_SESSION['post_id'] = 2;
$_SESSION['post_url'] = "../Blog/article2.php";
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
		
      <h2>Kids, 5G, and COVID-19</h2>
      <h5>Posted on December 5, 2020</h5>
       <img src="../Styles/children-playing_gary-varvel-300x213.jpg" width="300px" height="300px" alt="Blog Pic"/>
       <p>Not only with 5G completely change how devices interact with each other, but it will also directly impact life for children and families. Kids these days are very familiar with how technologies work, especially handheld devices such as cell phones and tablets. It seems like everywhere we go, we see kids on YouTube streaming videos, or downloading mobile games that require cellular data if in public places without Wi-Fi. 5G technology means quicker speeds for these children to stream more videos or download more data even quicker than we were used to before. In a world where children are glued to their mobile devices, 5G is an absolute game changer.</p>
       <p> 5G will also help power transformative technologies such as artificial intelligence, augmented reality and virtual reality that are changing our economy, including how students learn. The COVID-19 public health crisis has forced educators to set up digital classrooms, exposing some of the shortfalls in today’s technology that will be more heavily relied on in the future. AR and VR require higher bandwidth, lower latency and network resiliency, says Ashutosh Dutta, co-chair of the Institute of Electrical and Electronics Engineers 5G Initiative and a senior wireless research scientist at the Johns Hopkins University Applied Physics Laboratory. “It’s going to be helpful for not only education but robotics at home, intelligent transportation systems, e-health, smart wearables, etc.,” Dr. Dutta says.  </p>
       <p> The integration of technology in the classroom is key to equipping students for success, according to a new ICTC report. The report, which looks at the impact of technology on education in Canada, says AI changed how students learn and can help those with challenged such as anxiety or difficulty maintaining attention. It also says AI and machine learning can be used to personalize curricula for students based on their progress and individual interactions with different lessons. It also cites one recent study, published in the journal Nature Biotechnology, which found a 76-percent increase in learning outcomes when students used a VR simulation and a 101-percent increase when they used it in combination with traditional teaching. COVID-19 has shown us that it’s more than time for us to consider new opportunities and new ways of learning.  5G gives us the tools in terms of the increased capacity, the lower latency, the improved performance which has many implications for education. 5G will definitely be a turning point with children and young students around the world.</p>
		
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














