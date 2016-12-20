<?php
require_once('../includes/core/init.php');

$user = new User1();

//if not logged in redirect to login page
if(!$user->isLoggedIn()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Post</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>  <!--Text editing plugin-->
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="./">Blog Admin Index</a></p>

	<h2>Add Post</h2>

	<?php

  //Check if data was sent legally and not by refresh or CSRF
  if(Token::check(Input::get('token'))) {
    //if form has been submitted process it
    if(Input::exists()){
  	//basic validation
    $validate = new Validate();
    $blog = new Blog();
    $validation = $validate->check(array(
      'postTitle' => array(
          'required' => true
      ),
      'postDesc' => array(
          'required' => true
      ),
      'postCont' => array(
          'required' => true
      )
    ));


    if($validation->passed()) {  //If all form fields posted are valid.

      $_POST = array_map( 'stripslashes', $_POST );

  		//collect form data
  		extract($_POST);


        try {
          $blog->create(array(    //stores new user data in database. See User->create() function
              'author' => $user->data()['username'],
              'postTitle' => Input::get('postTitle'),
              'postDesc' => Input::get('postDesc'),
              'postCont' => Input::get('postCont'),
              'postDate' => date('Y-m-d H:i:s')
            ));

            //redirect to index
            header('Location: index.php');
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
	?>

	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error) && Input::exists()){ echo Input::get('postTitle');}?>'></p>

		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php if(isset($error) && Input::exists()){ echo Input::get('postDesc');}?></textarea></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error) && Input::exists()){ echo Input::get('postCont');}?></textarea></p>

      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>
