<?php //include config
require_once('../includes/core/init.php');
$user = new User1();

//if not logged in redirect to login page
if(!$user->isLoggedIn()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="users.php">User Admin Index</a></p>

	<h2>Edit User</h2>


	<?php

	//if form has been submitted process it
	if(isset($_POST['submit'])){
    $validate = new Validate();

    if(Input::exists('password')) { //Check if password Input exists
      //simple validation
      $validation = $validate->check(array(
        'username' => array(
            'required' => true,
            'unique' => 'username',
            'characters' => '/^[A-Za-z0-9]{3,15}$/'
        ),
        'email' => array(
            'required' => true,
            'characters' => '/^(([^<>()\]\\.,;:\s@"]+(\.[^<>()\[\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'
        ),
        'password' => array(
            'required' => true,
            'characters' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/',
        ),
        'passwordConfirm' => array(
            'required' => true,
            'matches' => 'password'
          )
      ));

    } else { //When password input does not exist
      $validation = $validate->check(array(
        'username' => array(
            'required' => true,
            'unique' => 'username',
            'characters' => '/^[A-Za-z0-9]{3,15}$/'
        ),
        'email' => array(
            'required' => true,
            'characters' => '/^(([^<>()\]\\.,;:\s@"]+(\.[^<>()\[\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'
        )
      ));
    }


    if($validation->passed()) {  //If all form fields posted are valid.
      if(Input::exists('password')) {
        $salt = Hash::salt(); //salt for hashing password. //See Hash class.
        try {
          $user->update(Input::get('id'), array(    //stores new user data in database. See User->create() function
              'username' => Input::get('username'),
              'password_digest' => Hash::make(Input::get('password'), $salt), //Hash salt and password input to get password_digest
              'salt' => $salt,
              'email' => Input::get('email')
            ));
          } catch(Exception $e) {
            die($e->getMessage());
          }
      } else {
        try {
          $user->update(Input::get('id'), array(    //stores new user data in database. See User->update() function
              'username' => Input::get('username'),
              'email' => Input::get('email')
            ));
          } catch(Exception $e) {
            die($e->getMessage());
          }
      }

      //redirect to index page
      header('Location: users.php?action=updated');
      exit;

    } else {
      foreach ($validation->errors() as $error) {
        echo '<p class="error">'.$error.'</p>';
      }
    }
	}
?>


	<?php
	//check for any errors

		try {

      $user->find(Input::get('id'));

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='memberID' value='<?php echo $user->data()['id'];?>'>

		<p><label>Username</label><br />
		<input type='text' name='username' value='<?php echo $user->data()['username'];?>'></p>

		<p><label>Password (only to change)</label><br />
		<input type='password' name='password' value=''></p>

		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value=''></p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php echo $user->data()['email'];?>'></p>
    <input type="hidden" name="id" value="<?php echo $user->data()['id']?>"
		<p><input type='submit' name='submit' value='Update User'></p>

	</form>

</div>

</body>
</html>
