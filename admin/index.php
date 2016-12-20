<?php
//include config
require_once('../includes/core/init.php'); //See includes/core/init.php

$user = new User1();
$blog = new Blog();

//if not logged in redirect to login page
if(!$user->isLoggedIn()){ header('Location: login.php'); }
if(isset($_GET['delpost'])){
	try {
		$blog->delete($_GET['delpost']); //delete post with the same id as the $_GET['delpost'] variable.
	} catch(Exception $e) {
		die($e->getMessage());
	}

	header('Location: index.php?action=deleted'); //Redirect to index page.
	exit;
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }
  </script>
</head>
<body>

	<div id="wrapper">

	<?php include('menu.php');?>

	<?php
	//show message from add / edit page
	if(isset($_GET['action'])){
		echo '<h3>Post '.$_GET['action'].'.</h3>';
	}
	?>

	<table>
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	<?php
		try {

			$results = $blog->get('blog_posts'); //Get blog info

			//Print contents of first 10 blog posts.
			foreach($results as $row){

				echo '<tr>';
				echo '<td>'.$row['postTitle'].'</td>';
				echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
				?>

				<td>
					<a href="edit-post.php?id=<?php echo $row['id'];?>">Edit</a> |
					<a href="javascript:delpost('<?php echo $row['id'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
				</td>

				<?php
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
	</table>

	<p><a href='add-post.php'>Add Post</a></p>

</div>

</body>
</html>
