<?php

	//set variable for connection
	//for webhost 

	// $dbhost = "localhost";
	// $dbuser = "id9865653_root";
	// $dbpassword = "12345";
	// $dbname = "id9865653_localhost";
	
	//

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbname = "multi-login";

    $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    if(!$db){
		die("connection failed" .mysqli_connect_error());
	}
?>
 