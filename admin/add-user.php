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
  <title>Admin - Add User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="users.php">User Admin Index</a></p>

	<h2>Add User</h2>

	<?php

  //Check if data was sent legally and not by refresh or CSRF
  if(Token::check(Input::get('token'))) {
    //if form has been submitted process it
    if(isset($_POST['submit'])) {
      //See Input class
      if(Input::exists()) {
        $validate = new Validate();
        $user = new User1();
        $validation = $validate->check(array(
          'username' => array(
              'required' => true,
              'unique' => 'username',
              'characters' => '/^[A-Za-z0-9]{3,15}$/' //Username regex
          ),
          'email' => array(
              'required' => true,
              'characters' => '/^(([^<>()\]\\.,;:\s@"]+(\.[^<>()\[\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/'
          ),
          'password' => array(
              'required' => true,
              'characters' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/' //password regex
          ),
          'passwordConfirm' => array(
              'required' => true,
              'matches' => 'password'
            )
        ));

        if($validation->passed()) {  //If all form fields posted are valid.

          $salt = Hash::salt(); //salt for hashing password. //See Hash class.

          try {
            $user->create(array(    //stores new user data in database. See User->create() function
                'username' => Input::get('username'),
                'password_digest' => Hash::make(Input::get('password'), $salt),
                'salt' => $salt,
                'email' => Input::get('email')
              ));
            } catch(Exception $e) {
              die($e->getMessage());
            }
          } else {
            foreach ($validation->errors() as $error) {
              echo '<p class="error">'.$error.'</p>';
            }
          }

      }
    }

  }
?>

	<form action='' method='post'>

		<p><label>Username</label><br />
		<input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>

		<p><label>Password</label><br />
		<input type='password' name='password' value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>

		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >

		<p><input type='submit' name='submit' value='Add User'></p>

	</form>

</div>
