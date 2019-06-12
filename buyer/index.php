<?php
  include('../functions.php');

  if (!isLoggedIn() || !isBuyer($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>
<?php include_once('buyer_header.php') ?>
<?php include_once('buyer_home.php') ?>