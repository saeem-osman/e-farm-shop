<?php

	include('functions.php');

	if(!isLoggedIn()){
		$_SESSION['msg'] = "You must logged in first";
		header('location: login.php');
	}
	else if(isLoggedIn() && isSeller($_SESSION['user'])){
		header('location: seller_home.php');
	}else if(isLoggedIn() && isBuyer($_SESSION['user'])){
		header('location: buyer_home.php');
	}else if(isLoggedIn() && isAdmin($_SESSION['user'])){
		header('location: admin_home.php');
	}
?>
