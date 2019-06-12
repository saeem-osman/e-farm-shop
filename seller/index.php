<?php
  include('../functions.php');

  if (!isLoggedIn() || !isSeller($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>
<?php include_once('../connection.php'); ?>
<?php include_once('seller_header.php'); ?>
<?php include_once('seller_home.php'); ?>
