<?php //index.php
  require_once('includes/core/init.php'); //See includes/core/init.php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">

      <h1>Blog</h1>
  		<hr />

  		<?php
        $blog = new Blog();
        $blog->get('blog_posts');//Retreives all data from Users table

          //Print Blog info retreived from database
          foreach ($blog->data() as $results) {
  					echo '<div>';
  					echo '<h1><a href="viewpost.php?id='.$results['id'].'">'.$results['postTitle'].'</a></h1>';
  				  echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($results['postDate'])).'</p>';
  					echo '<p>'.$results['postDesc'].'</p>';
  					echo '<p><a href="viewpost.php?id='.$results['id'].'">Read More</a></p>';
  					echo '</div>';
  				}
  		?>

	</div>


</body>
</html>
