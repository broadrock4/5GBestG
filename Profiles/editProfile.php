<!DOCTYPE html>

<html lang="en">
<head>
<meta charset ="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Profile Page</title>
<link rel="stylesheet" type="text/css" href="../Styles/5GBestG.css">
<body>
<header>
  <nav> 
    <!--Logo for website --> 
    <img class="logo" src="../Styles/Logo.png" alt="Logo"/>
    <hr>
    
    <!-- Navigation Bar -->
    <div class="nav"> <a class="active"
          href="../Home/home.html">Home</a> <a href="../About_Us/about.php">About</a> <a href="../Contact_US/contact.html">Contact Us</a> <a href="../Profiles/userProfile.php">myProfile</a> <a href="../Login/login.html">Login</a> 
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
<!-- This code is subject to change because all this information will need to be pulled from a database. We wanted to show what the final project will look like -->
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
	
<footer class="AboutFooter"> <a href="../Contact_US/contact.html"> Contact Us</a> <a href="../About_Us/about.php"> About Us </a> </footer>
</body>
</html>
