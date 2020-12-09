<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us Webpage</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="../Styles/5GBestG.css"/>
</head>

<body>
	<script type="text/javascript" color="#4eacea,#c1d8ac,#ebe1a9" opacity="1.0" zIndex="-2" count="120" src="//cdn.bootcss.com/canvas-nest.js/1.0.0/canvas-nest.min.js"></script>
<header>
  <div class="menu-container">
    <nav> 
      <!--Logo for website --> 
      <img src="../Styles/Logo.png" class="logo" alt="The Logo for our webpage"/>
      <hr>
      
      <!-- Navigation Bar -->
       <div class="nav">
          <a class="active"
          href="../Home/home.html">Home</a>
            <a href="../About_Us/about_us.php">About Us </a>
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
  </div>
</header>
<h1>About Us</h1>
<div class= "container-grid"> 
	<div class="col-1"> <img src="../Styles/5G_Logo_Bold_-_Pink.png" alt="Profile Pic"/> </div>
  <div class="col-2">
  <p> The majority of people hear “5G” being advertised on numerous media outlets, whether it be on television ads, mobile ads, radio, billboards etc. Ask anyone about what 5G is, and they’ll probably say something like “It’s just a faster network for my devices”. As true as that may be, is that really all it is? The fact of the matter is that the masses don’t really know the concept of 5G and the pros and cons that come with it. Our blog site will help inform the general public of what really 5G is, how it works, and the potential hazardous health complications that come with it. Inform the public about 5G and provide a greater understanding of what it is, where 5G comes from, benefits and disadvantages, and the future capabilities. </p>
	</div>
</div>
<div class="displayAdmins">
	<h2> Admin List </h2>
	<?php
	include "../Config/config.php";
	
	$sql = "SELECT user_pic, username, user_bio FROM users where admin = '1'";
	$result = mysqli_query( $link, $sql );
	echo("<table class='adminTable'> <tr> <th class='tableImg'> Admin Photo </th> <th class='tableName'> Admin Name </th> <th class='tableBio'> Admin Bio </th> </tr>");
	if ( mysqli_num_rows( $result ) > 0 ) {
	  while ( $data = mysqli_fetch_assoc( $result ) ) {
	    $image = $data[ 'user_pic' ];
	    $image_src = "../Profiles/uploads/" . $image;
	    $tempName = $data[ 'username' ];
	    $tempBio = $data[ 'user_bio' ];
	    echo( "<tr class='tableBorder'><td class='tableImg'> <img class='adminImg' src='$image_src'/> </td>" );
	    echo( "<td class='tableName'>" . $tempName . "</td>");
	    echo( "<td class='tableBio'> <div style='height:90px; overflow:hidden;'>" . $tempBio . " </div></td> </tr>" );
	  }
	}
	echo("</table>");
	mysqli_close( $link );

	?>
	</div>
	
  <br/>

	<footer class="AboutFooter"> 
	<a href="../Contact_US/contact_us.html"> Contact Us</a> 
	 <a href="../About_Us/about_us.php">About Us</a>
	</footer>
</body>
</html>
