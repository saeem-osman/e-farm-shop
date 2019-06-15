
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3" style="margin-left: 30px;">

      <?php
      $user = $_SESSION['user_id'];


$sql = "SELECT * FROM users WHERE id = '$user'";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));
if ($result && $result->num_rows > 0) {
    $rws = mysqli_fetch_array($result);
?>


        <p style="font-size: 25px; margin-left: 20px;margin-top: 20px;">
            <img src="../img/pro.PNG" width="50" height="50">
          <b><h1><?php echo $rws['username']; ?></h1></b></p>
      <hr>
      <p style="font-size: 15px; margin-left: 20px;">
          <b>District:</b> <?php echo $rws['district']; ?><br></p>


        <p style="font-size: 15px;margin-left: 20px;">
          <b>Email:</b> <?php echo $rws['email']; ?><br> </p>
        <p style="font-size: 15px;margin-left: 20px;">
          <b>Phone Number:</b> <?php echo $rws['phone']; ?><br></p>

          <div class="user_type">
            <p style="font-size: 15px;margin-left: 20px;">
          <b>User Type:</b><i style="color: red; font-weight: bolder; font-size: 18px"><?php echo ' '.$rws['user_type']; ?></i> <br></p>
          </div>
        <?php } ?>
        <p style="font-size: 15px;margin-left: 20px;">
          <b>Accepted Orders:</b> 0<br>
        </p>
        <br><br>
    </div>

    <?php
        global $db;
        $seller_id = $_SESSION['user_id'];
        $query = "SELECT * from purchase WHERE seller_id= '$seller_id'";
        $result = mysqli_query($db,$query);
        if($result && mysqli_num_rows($result) > 0){
          echo "
                  <div class='col-sm-8' style='margin-left: 30px;'>
        <h4 style='color: #FF7A00; font-size: 20px;'><b>Requests</b></h4>
      <hr>
      <table class='table table-striped table-bordered' >
           <thead>
             <tr>
                 <th>Customer Name</th>
               <th>Address</th>
               <th>Product</th>
               <th>Quantity</th>
               <th>Date</th>
               <th>Phone Number / Email</th>
               <th>Total</th>
               <th colspan='2'>Confirmation</th>
               <th>Status</th>

             </tr>
           </thead>
           <tbody> ";

           while ($data = mysqli_fetch_assoc($result)) {
            $purchase_id = $data['pid'];
            $buyer_id = $data['buyer_id'];
            $product_id = $data['product_id'];
            $product_qty = $data['product_qty'];
            $purchase_date = $data['date'];
            $total_price = $data['total_price'];
            $status = $data['status'];

            //finding customer info
            $customer_data = mysqli_query($db, "SELECT * from users WHERE id='$buyer_id'");
            if(!$customer_data) die("error ".mysqli_error());
            $customer_info = mysqli_fetch_assoc($customer_data);
            $customer_name = $customer_info['username'];
            $customer_district = $customer_info['district'];
            $customer_address = $customer_info['address'];
            $customer_email = $customer_info['email'];
            $customer_phone = $customer_info['phone'];
            $customer_address = $customer_address ? $customer_address : $customer_district;
            $customer_contact = $customer_phone ? $customer_phone : $customer_email;

            //finding product item name
            $product_data = mysqli_query($db, "SELECT pname from products WHERE pid='$product_id'");
            if(!$product_data) die("error ".mysqli_error());
            $product_info = mysqli_fetch_assoc($product_data);
            $product_name = $product_info['pname'];

           echo "
             <tr>
               <td>$customer_name</td>
               <td>$customer_address</td>

               <td>$product_name</td>
               <td>$product_qty</td>
               <td>$purchase_date</td>
               <td>$customer_contact</td>

               <td>$total_price</td>
               <td><a href='index.php?accept=$purchase_id'>Accept</a></td>
               <td><a href='index.php?decline=$purchase_id'>Decline</a></td>
                <td>$status</td>
             </tr> ";
           } ?>
           </tbody>
         </table>
          </div>
                <?php     
        }
    ?>


        </div>
      </div>

<?php

  if(isset($_GET['accept'])){
    $purchase_item_id = $_GET['accept'];
    $query = "UPDATE purchase SET status='accepted' WHERE pid= '$purchase_item_id' ";
    $result= mysqli_query($db,$query);
    if(!$result) die("error" .mysqli_error());
    else{
      header('location: index.php');
    }
  }

  if(isset($_GET['decline'])){
    $purchase_item_id = $_GET['decline'];
    $query = "UPDATE purchase SET status='rejected' WHERE pid='$purchase_item_id' ";
    $result = mysqli_query($db,$query);
     if(!$result) die("error" .mysqli_error());
     else{
      header('location: index.php');
     }
  }


?>



    <footer class="container-fluid text-center" style="margin-top: 235px;">
  <p>© 2018 CONNECT</p>
</footer>
</body>
</html>
