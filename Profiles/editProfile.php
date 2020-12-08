<!DOCTYPE html>

<html lang="en" class="loginHtml">
<head>
<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Profile Page</title>
<link rel="stylesheet" type="text/css" href="../Styles/5GBestG.css">
<body>
	<script type="text/javascript" color="#4eacea,#c1d8ac,#ebe1a9" opacity="1.0" zIndex="-2" count="120" src="//cdn.bootcss.com/canvas-nest.js/1.0.0/canvas-nest.min.js"></script>
<header>
  <nav> 
    <!--Logo for website --> 
    <img class="logo" src="../Styles/Logo.png" alt="Logo"/>
    <hr>
    
    <!-- Navigation Bar -->
    <div class="nav"> <a class="active"
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
<h1>Edit Profile</h1>
	
<form class="postArea" action="upload.php" method="post">
  <label>Your Bio:</label>
  <br>
  <br>
  <textarea placeholder="Enter text here..." required id="createpost" name="editBio" rows="5" cols="50">
</textarea>
  <br>
  <input type="submit" name="submitBio" value="Submit">
</form>
	
<footer class="AboutFooter">  <a href="../Contact_US/contact_us.html">Contact Us</a>
	 <a href="../About_Us/about_us.php">About Us</a> </footer>
</body>
</html>
