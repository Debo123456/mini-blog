<?php
	//Starts php session
	session_start();


	/*stores array of data that will be used frequently by other scripts,
	good practice for storing database credentials in separate files and in separate location.
	*/
	$GLOBALS["config"] = array(
		'mysql' => array(
			'host' => 'localhost',  //database host
			'username' => 'admin', //database username
			'password' => 'password',  //database password
			'db' => 'blog'  //database name
		),
    'session' => array(
      'session_name' => 'user', //name of session variable that will be used to create user session
      'token_name' => 'token'  //name of session variable to prevent illegal get and post requests
    )
  );

	//Automatically loads Classs as they are called and instantiated
	spl_autoload_register(function($class) {
    $path = $_SERVER['DOCUMENT_ROOT'];
		require_once($path . '/mini-blog' .'/includes/classes/' . $class . '.php');
	});
?>
