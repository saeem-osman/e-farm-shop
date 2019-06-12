<?php
  include('../functions.php');
  if (!isLoggedIn() || !isAdmin($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>

<?php include_once('admin_header.php'); ?>
<?php include_once('admin_home.php'); ?>