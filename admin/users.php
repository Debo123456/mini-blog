<?php
//include config
require_once('../includes/core/init.php');
$user = new User1();
$db = DB::getInstance();
//if not logged in redirect to login page
if(!$user->isLoggedIn()){ header('Location: login.php'); }

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Users</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script language="JavaScript" type="text/javascript">
	  function deluser(id, title)
	  {
		  if (confirm("Are you sure you want to delete '" + title + "'"))
		  {
		  	window.location.href = 'users.php?deluser=' + id;
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
		echo '<h3>User '.$_GET['action'].'.</h3>';
	}
	?>

	<table>
	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
	<?php
			$results = $db->get('blog_members'); //Retreive all users info from database.
      //Print users info retreive from database.
			foreach($results->results() as $row){

				echo '<tr>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				?>

				<td>
					<a href="edit-user.php?id=<?php echo $row['id']; //print edit link?>">Edit</a>
					<?php if($row['id'] != 1){  //Prevent the deletion of user with id number of 1. (Admin).?> 
						| <a href="javascript:deluser('<?php echo $row['id'];?>','<?php echo $row['username']; //print delete link?>')">Delete</a> .
					<?php } ?>
				</td>

				<?php
				echo '</tr>';

			}


	?>
	</table>

	<p><a href='add-user.php'>Add User</a></p>

</div>

</body>
</html>
