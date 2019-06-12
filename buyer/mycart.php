<?php include_once('../connection.php'); ?>
<?php session_start(); ?>
<?php
if(isset($_POST["get_cart_product"])){
	$id = $_SESSION['user_id'];
	$sql = "SELECT * FROM cart WHERE user_id = '$id'";
	$run_query = mysqli_query($db,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$no = 0;
		while ($row = mysqli_fetch_array($run_query)) {

			$pro_id = $row["p_id"];
			$pro_name = $row["produc_ttitle"];
			$pro_image = $row["product_image"];
			$pro_price = $row["price"];


      $no = $no +1;
      if(isset($_POST["get_cart_product"])){
        echo "
  			<div class='row'>
            <div class='col-md-3'>$no</div>
            <div class='col-md-3'>$pro_name</div>
            <div class='col-md-3'><img src='../$pro_image' width='60px'; height='50px'></div>
            <div class='col-md-3'>‎৳.$pro_price.00</div>
          </div>

  			";
        $no = $no +1;
      }
    }
  }
}
/*
if(isset($_POST["cart_checkout"])){
	$id = $_SESSION['user']['id'];
	$sql = "SELECT * FROM cart WHERE user_id = '$id'";
	$run_query = mysqli_query($db,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$no = 0;
		while ($row = mysqli_fetch_array($run_query)) {

			$pro_id = $row["p_id"];
			$pro_name = $row["produc_ttitle"];
			$pro_image = $row["product_image"];
			$pro_price = $row["price"];
      $qty = $row["qty"];
      $total = $row["total_amt"];

      if(isset($_POST["cart_checkout"])){
        echo "

        <div class='row'>
          <div class='col-md-2'>
            <div class='btn-group'>
              <a href='#' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></a>
              <a href='#' class='btn btn-primary'><span class='glyphicon glyphicon-ok-sign'></span></a>
            </div></div>
        <div class='col-md-2'>Product Image</div>
      <div class='col-md-2'>$pro_name</div>
      <div class='col-md-2'>Product Price</div>
        <div class='col-md-2'>Product Quantity</div>

        <div class='col-md-2'>Total Amount</div>



    </div>
        ";
      }

	}
}
}
*/

?>
