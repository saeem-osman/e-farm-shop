
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3" style="margin-left: 30px;">

      <?php
      global $db;
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
          <b>Total Orders:</b> 0<br>
        </p>
        <br><br>
    </div>

    
      <div class="col-sm-8" style="margin-left: 30px;">
            <?php
        global $db;
        $user_id = $_SESSION['user_id'];
        $query = "SELECT p.buyer_id,p.o_id ,p.product_id, p.seller_id, p.total_price, p.buyer_address, p.status, p.product_qty, p.date FROM purchase p WHERE p.buyer_id = '$user_id'  ";
        $result = mysqli_query($db,$query);
        if(!$result){
          die("error mysql " . mysqli_error($db));
        }
        if(mysqli_num_rows($result) > 0){
          echo "
        <h4 style='color: #FF7A00; font-size: 20px;'><b>Requested</b></h4>
      <hr>
      <table class='table table-striped table-bordered' >
           <thead>
             <tr>
                 <th>Seller Name</th>
               <th>Seller Address</th>
               <th>Product</th>
               <th>Quantity</th>
               <th>Date</th>
               <th>Phone Number / Email</th>
               <th>Total</th>
               <th>Status</th>
              
             </tr>
           </thead>
           <tbody> ";


          while ($items = mysqli_fetch_assoc($result)) {
              $buyer_id = $items['buyer_id'];
              $product_id = $items['product_id'];
              $seller_id = $items['seller_id'];
              $total_price = $items['total_price'];
              $buyer_address = $items['buyer_address'];
              $product_status = $items['status'];
              $product_qty = $items['product_qty'];
              $purchase_date = $items['date'];

              $product_table = mysqli_query($db, "SELECT pname from products WHERE pid = '$product_id' ");
              if(!$product_table){
                die("error table " . mysqli_error($db));
              }
              $result_table = mysqli_fetch_assoc($product_table);
              $product_name = $result_table['pname'];
              $user_table = mysqli_query($db, "SELECT username,district, address,email,phone from users WHERE id = '$seller_id' ");
              if(!$user_table) die("mysqli error " . mysqli_error());
              $user_data = mysqli_fetch_assoc($user_table);
              $seller_name = $user_data['username'];
              $seller_district = $user_data['district'];
              $seller_address = $user_data['address'];
              $seller_address = $seller_address ? $seller_address : $seller_district;
              $seller_email = $user_data['email'];
              $seller_phone = $user_data['phone'];
              $seller_contact = $seller_phone ? $seller_phone : $seller_email;
        ?>
            <?php echo "
             <tr>
               <td>$seller_name</td>
               <td>$seller_address</td>
               
               <td>$product_name</td>
               <td>$product_qty</td>
               <td>$purchase_date</td>
               <td>$seller_contact</td>
               
               <td>$total_price</td>
               <td>$product_status</td>
               
             </tr> ";
           } ?> <?php echo "
           </tbody>
         </table> ";
        } ?>
          </div>
        </div>
      </div>
  

    <footer class="container-fluid text-center" style="margin-top: 235px;">
  <p>© 2018 CONNECT</p>
</footer>
</body>
</html>
