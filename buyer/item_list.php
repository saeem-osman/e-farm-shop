<?php
  include('../functions.php');
  ob_start();
  if (!isLoggedIn() || !isBuyer($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>
<?php include_once('buyer_header.php'); ?>
<?php
  global $db;
  $user_id = $_SESSION['user_id'];
  $query = "SELECT * from cart WHERE user_id='$user_id' ";
  $result = mysqli_query($db,$query);
  if(!$result){
    die("error" .mysqli_error($db));
  }
  if(mysqli_num_rows($result)>0){
    include_once("cartItems.php");
  }else{
    include_once("empty_cart.php");
  }

?>
