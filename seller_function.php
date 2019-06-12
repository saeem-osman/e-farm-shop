<?php

if(isset($_POST['removeItem'])){
	$item_to_delete = $_POST['itemId'];
	header('location: seller_home.php');
}

?>