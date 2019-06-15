
<?php
  include('../functions.php');

  if (!isLoggedIn() || !isAdmin($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>
<?php include_once('admin_header.php'); ?>
                <div class="orders">

                <div class="order-list">
                  <nav class="nav-sitenav">
                    <ul class="navigation">
                     <li><a href="orders.html">All</a></li>
                        <li><a href="order1.html">Processing</a></li>
                        <li><a href="order2.html">Completed</a></li>

                    </ul>
                  </nav>
                </div>
              </div>

              <?php

                  global $db;
                  $query = "SELECT * FROM purchase WHERE status='accepted' ";
                  $result = mysqli_query($db,$query);
                  if(!$result) die('error '. mysqli_error());
                  if(mysqli_num_rows($result)>0){



                    ?>

              <div class="order-table">

                <div class="table-responsive datagrid">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Purchase Id</th>
                    <th>Item Name</th>
                    <th>Sender</th>
                    <th>Receiver</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th colspan="4">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
                    while ($list = mysqli_fetch_assoc($result)) {
                      $item_status = $list['status'];
                      $item_date = $list['date'];
                      $purchase_id = $list['pid'];
                      $product_id = $list['product_id'];
                      $buyer_id = $list['buyer_id'];
                      $seller_id = $list['seller_id'];
                      $product_qty = $list['product_qty'];
                      $product_price = $list['total_price'];
                      # code...

                      //seller info
                      $seller_info = mysqli_query($db, "SELECT * from users WHERE id='$seller_id'");
                      if(!$seller_info) die('error '.mysqli_error());
                      $seller_details = mysqli_fetch_assoc($seller_info);
                      $seller_name = $seller_details['username'];
                      $seller_address = $seller_details['address'];
                      
                      //buyer_info
                      $buyer_info = mysqli_query($db, "SELECT * from users WHERE id='$buyer_id'");
                      if(!$buyer_info) die('error '.mysqli_error());
                      $buyer_details = mysqli_fetch_assoc($buyer_info);
                      $buyer_name = $buyer_details['username'];
                      $buyer_address = $buyer_details['address'];
                      
                      //product_name

                      $product_info = mysqli_query($db, "SELECT pname from products WHERE pid='$product_id'");
                      if(!$product_info) die('error '.mysqli_error());
                      $product_details = mysqli_fetch_assoc($product_info);
                      $product_name = $product_details['pname'];


                      echo "

                        <tr>
                            <td>$purchase_id</td>
                            <td>$product_name</td>
                            <td>$seller_name . from . $seller_address</td>
                            <td>$buyer_name . from . $buyer_address </td>
                            <td>$item_date </td>
                            <td>$product_price</td>

                            <td><label class='cons'>Product Recieved
                                  <input type='checkbox'>
                                  <span class='checkmark'></span>
                                  </label></td>
                            <td><label class='cons'>Sent To Destination
                                  <input type='checkbox'>
                                  <span class='checkmark'></span>
                                  </label></td>
                            <td><button>Submit</button></td>
                            <td><button>Detail</button></td>


                      </tr>
                

                      ";

                    }

                    ?>


            </tbody>

        </table>
    </div>
              <?php
                  }

               ?>




                </div>
            </div>
    </body>
</html>
