
<p><br/></p>
<p><br/></p>
<p><br/></p>
<p><br/></p>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="panel panel-primary">
      <div class="panel-heading">Cart Checkout</div>
      <div class="panel-body">
      <div class="row">
        <div class="col-md-2"><b>Action</b></div>

        <div class="col-md-2"><b>Product Image</b></div>
        <div class="col-md-2"><b>Product Name</b></div>
        <div class="col-md-2"><b>Quantity</b></div>
          <div class="col-md-2"><b>Product Price</b></div>

          <div class="col-md-2"><b>Total Amount</b></div>
        </div>

        <div id="cart_checkout"></div>
        <?php
        $user = $_SESSION['user_id'];
          global $db;
        	$query = "SELECT * FROM cart WHERE user_id=$user";


        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) > 0)
        {

        	while($row = mysqli_fetch_array($result))
        	{
                  $o_id = $row["o_id"];
            			$pro_id = $row["p_id"];
            			$pro_name = $row["produc_ttitle"];
            			$pro_image = $row["product_image"];
            			$pro_price = $row["price"];
                  $qty = $row["qty"];
                  $total = $qty * $pro_price;
echo "
        <div class='row'>
        <div class='col-md-2'>
            <div class='btn-group'>
              <a href='item_list.php?delete={$o_id}' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
              <a href='' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
            </div></div>
        <div class='col-md-2'><img src='../$pro_image' height=50px; width=60px;></div>
      <div class='col-md-2'>$pro_name</div>
      <div class='col-md-2'><input type='text' class='form-control' value='$qty' disable></div>
      <div class='col-md-2'><input type='text' class='form-control' value='$pro_price' disabled></div>
      <div class='col-md-2'><input type='text' class='form-control' value='$total' disabled></div>

    </div>";
  }
  }
  if(isset($_GET["delete"])){
    global $db;
    
    $the_delete_id = $_GET["delete"];
    
    $user = $_SESSION['user_id'];
    $sql = "DELETE FROM cart WHERE o_id='$the_delete_id' ";
    $run_query = mysqli_query($db, $sql);
    if($run_query){
      header("Location: item_list.php");
      ob_enf_fluch();
    }else{
      echo "error".mysqli_error($db);
    }
  }
    ?>

      <div class="panel-footer"></div>
    <div class="col-md-10"></div>

    <?php
    global $db;
    if(isset($_POST['submit'])){

      $user = $_SESSION['user_id'];
      $user_address = $_SESSION['user_address'];
      $date = date("Y/m/d");
      // $query = "INSERT INTO purchase (`o_id`,`buyer_id`,`seller_id`,`total_price`, `buyer_address`, `seller_address`) "
      //         ."SELECT c.o_id, c.user_id, c.seller_id, c.total_amt, u.address, p.seller_address FROM products p, cart c, users u WHERE c.user_id = '$user' "
      //         ."AND u.id = '$user' ";
        // $query = "INSERT INTO purchase (`o_id`,`product_id`,`buyer_id`,`seller_id`, `product_qty`,`total_price`, `buyer_address`, `date`) "
        // ."SELECT c.o_id, c.p_id, c.user_id, c.seller_id, c.qty, c.total_amt, '$user_address', '$date' FROM cart c WHERE c.user_id = '$user' ";

        $query = "INSERT INTO purchase (`o_id`,`product_id`,`buyer_id`,`seller_id`, `product_qty`,`total_price`, `buyer_address`, `date`) "
        ."SELECT o_id, p_id, user_id, seller_id, qty, total_amt, '$user_address', '$date' FROM cart WHERE user_id = '$user' ";




    $result = mysqli_query($db,$query);
    $delete_query = "DELETE FROM cart WHERE user_id='$user'";
    $delete_result = mysqli_query($db,$delete_query);
    if($result && $delete_result){
      header('location: thanks.php');
    }else{
      echo "error".mysqli_error($query);
    }
    }

    ?>
    <form method="post" action="item_list.php">
    <button type='submit' name='submit' class='btn btn-primary'>Okay </button>
    </form> 
    

 
</div>
</div>
</div>
</div>


<?php


/*
   <?php
    if(isset($_POST["purchase_btn"])){
      $user = $_SESSION['user']['id'];
      $query = "INSERT INTO purchase (`o_id`,`buyer_id`,`total_price`) "
              ."SELECT `o_id`, `user_id`,`total_amt` FROM cart WHERE user_id = '$user' ";


    $result = mysqli_query($db,$query);
    }
    ?>
    <pre>
    <?php
    print_r($result);
    ?>
    </pre>
      <button type="submit" class="btn btn-primary" name="purchase_btn" style="color: white;font-weight: bold;">Confirm</button>

      */


?>