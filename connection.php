<?php

	//set variable for connection
	//for webhost 

	// $dbhost = "localhost";
	// $user = "id9865653_root";
	// $password = "12345";
	// $dbname = "id9865653_localhost";
	
	//

	$dbhost = "localhost";
	$user = "root";
	$password = "";
	$dbname = "multi-login";

    $db = mysqli_connect($dbhost, $user, $password, $dbname);
    if(!$db){
		die("connection failed" .mysqli_connect_error());
	}
?>
 