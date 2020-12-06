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

    <header>
      <nav>
        <!--Logo for website -->
        <img src="../Styles/Logo.png" class="logo" alt="The Logo for our webpage"/>
        <hr>

        <!-- Navigation Bar -->
       <div class="nav">
          <a class="active"
          href="../Home/home.html">Home</a>
            <a href="../About_Us/about.php">About</a>
            <a href="../Contact_US/contact.html">Contact Us</a>
            <a href="../Profiles/userProfile.php">myProfile</a>
			<a href="../Login/login.html">Login</a>
			<!-- This link will have php that is only visible if viewer is an Admin -->
            <div class="search-container">
				
              <form action="/action_page.php">
                <input type="text"
          placeholder="Search.." name="search">
                <button
          type="submit">Submit</button>
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
		
      <h2>Is 5G Harmful?</h2>
      <h5>Posted on December 5, 2020</h5>
       <img src="../Styles/165GCOVER-superJumbo.jpg" width="300px" height="300px" />
       <p>As 5G technology makes its way around the world, people are starting to wonder if the electromagnetic field that comes with the 5G technology is safe. Many organizations and government agencies have deemed the 5G technology to be completely safe, with no effects of radio frequencies on our health. With that being said, there are some health experts that strongly disagree about 5G being safe. 5G technology consists of electromagnetic fields, which is a field of energy that results from electromagnetic radiation, a form of energy that occurs as a result of the flow of electricity. These electric fields can be found wherever there are power lines or outlets regardless whether the electricity is switched on or not. </p>
       <p> Electromagnetic radiation exists as a spectrum of different wavelengths and frequencies, which are measured in hertz (Hz). Power lines typically operate between 50 and 60 Hz, which is fairly low on the spectrum. Radiofrequency EMFs include all wavelengths from 30 kilohertz to 300 GHz. The general public gets exposed to these RF-EMFs from things like handheld devices such as cell phones and tablets. RF-EMF is seen a lot in heating. High doses of RF-EMFs can lead to a rise in the temperature of the exposed tissues, leading to burns and other damage. Mobile devices emit RF-EMFs at low levels. The arrival of 5G has people concerned about these levels of radiation. </p>
       <p> The World Health Organization states that “To date, no adverse health effects from low level, long term exposure to radiofrequency or power frequency fields have been confirmed, but scientists are actively continuing to research this area.” The Federal Communications state that “At relatively low levels of exposure to RF radiation – i.e., levels lower than those that would produce significant heating – the evidence for production of harmful biological effects is ambiguous and unproven.” However, Dr. Lennart Hardell from the department of oncology at Orebro University in Sweden thinks otherwise. In a 2017 article in the International Journal of Oncology, he states that “Being a member of ICNIRP is a conflict of interest in the scientific evaluation of health hazards from RF radiation through ties to military and industry. </p>
       <p>This is particularly true, since the ICNIRP guidelines are of huge importance to the influential telecommunications, military, and power industries.” Dr. Hardell is one twenty-nine medical and scientific experts that issued The BioInitiative report that states that “Bioeffects are clearly established and occur at very low levels of exposure to [EMFs] and radiofrequency radiation.” The report highlights links to DNA damage, oxidative stress, neurotoxicity, carcinogenicity, sperm morphology, and fetal, newborn, and early life development. They even propose a link between RF-EMF exposure and a higher risk of developing autism spectrum disorder. The group urges governments and health agencies to establish new safety limits to protect the general public. The bottom line is, there is evidence that ties RF-EMF exposure to a small increase in the risk of developing certain cancers and other adverse health outcomes. Studies are still being conducted, so as we get updated throughout the years, it will become more clear whether or not 5G is really harmful to us. Until then, we either have to hang back and wait for more information, or pick a side of harmful or not harmful. </p>
		
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
		<a href="../Contact_US/contact.html"> Contact Us</a> 
		<a href="../About_Us/about.php"> About Us </a>
	</footer>
  </body>
</html>


<!-- This button will have php to only allow Admins to see -->
		  <input type="button" value="Remove"/>













