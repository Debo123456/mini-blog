<?php
require_once('includes/core/init.php'); //See includes/core/init.php

$blog = new Blog();
$blog->find(Input::get('id'));//Retreive blog information with the id passed in the GET variable.

//if post does not exists redirect user to index page.
if(Input::get('id') == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $blog->data()['postTitle'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">

		<h1>Blog</h1>
		<hr />
		<p><a href="./">Blog Index</a></p>


		<?php
		//Print blog information.
			echo '<div>';
				echo '<h1>'.$blog->data()['postTitle'].'</h1>';
				echo '<p>Posted on '.date('jS M Y', strtotime($blog->data()['postDate'])).'</p>';
				echo '<p>'.$blog->data()['postCont'].'</p>';
			echo '</div>';
		?>

	</div>

</body>
</html>
