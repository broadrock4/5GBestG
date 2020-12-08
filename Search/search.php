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
<?php
if ( isset( $_POST[ 'searchSubmit' ] ) ) {
	include "../Config/config.php";
	echo("<h1 style='text-decoration: underline;'> Search Results </h1>");
	$search = $_POST["search"];
  $sql = "SELECT post_url, title FROM blog_post WHERE title LIKE '%$search%'";
  $result = mysqli_query($link, $sql);
        $queryResult = mysqli_num_rows($result);

        if($queryResult > 0) {
            while($row = mysqli_fetch_assoc($result)) {
		$url = $row['post_url'];
		$tempTitle = $row['title'];
				
                echo( "<div style='text-align: center;'>");
                echo(" <a href='$url' ]> $tempTitle </a> ");                         
           	echo("</div>");
            }

        } else {
            echo "There are no results matching your search!";
        }

  mysqli_close( $link );
}
// Close connection
?>
</body>
</html>
