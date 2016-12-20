<?php
//include config
require_once('../includes/core/init.php');

$user = new User1();

//check if already logged in
if( $user->isLoggedIn() ){ header('Location: index.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="login">

	<?php
	//process login form if submitted
	if(isset($_POST['submit'])){

    //Login validation
    $validate = new Validate();
    			$validation = $validate->check(array(
    				'username' => array(
              'required' => true
            ),
    				'password' => array(
              'required' => true
            )
    			));

    			if($validation->passed()) { //If login credentials exists.
    				//log user in

    				$login = $user->login(Input::get('username'), Input::get('password')); //Log user in. See User->login() function.
    				if($login)
    				{
    					header('Location: index.php'); //If login was succesful redirect to index page.
    				}
    				else {
                $message = 'username or password invalid'; //If login was unsuccesful store error message in $message variable.
    				}
    			}
    			else {
              $message = 'Username and password is required';// if validation failed store error message in $message variable.
    				}
    			}//end if submit

	if(isset($message)){ echo $message; }
	?>

	<form action="" method="post">
    <div id="form-header">
      <span>Login</span>
    </div>
	  <p><label>Username</label><input type="text" name="username" value=""  /></p>
	  <p><label>Password</label><input type="password" name="password" value=""  /></p>
	  <p><label></label><input type="submit" name="submit" value="Login"  /></p>
	</form>

</div>
</body>
</html>
