
<?php
include_once('functions.php');
?>


<?php include_once('buyer_header.php'); ?>
 
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3" style="margin-left: 30px;">

      <?php
      global $db;
      $user = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = '$user'";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));
if ($result && $result->num_rows > 0) {
    $rws = mysqli_fetch_array($result);


?>
        
         
        <p style="font-size: 25px; margin-left: 20px;margin-top: 20px;"> 
            <img src="img/pro.PNG" width="50" height="50">
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
        <h4 style="color: #FF7A00; font-size: 20px;"><b>Requested</b></h4>
      <hr>
      <table class="table table-striped table-bordered" >
           <thead>
             <tr>
                 <th>Seller Name</th>
               <th>District</th>
               <th>Product</th>
               <th>Quantity</th>
               <th>Date</th>
               <th>Phone Number / Email</th>
               <th>Total</th>
               <th>Status</th>
              
             </tr>
           </thead>
           <tbody>
             <tr>
               <td>John</td>
               <td>Doe</td>
               
               <td>Mary</td>
               <td>Moe</td>
               <td>Mary</td>
               <td>Moe</td>
               
               <td>Mary</td>
               <td>Moe</td>
               
             </tr>
             <tr>
               <td>John</td>
               <td>Doe</td>
               
               <td>Mary</td>
               <td>Moe</td>
               <td>Mary</td>
               <td>Moe</td>
               
               <td>Mary</td>
               <td>Moe</td>
               
             </tr>
             <tr>
               <td>John</td>
               <td>Doe</td>
               
               <td>Mary</td>
               <td>Moe</td>
               <td>Mary</td>
               <td>Moe</td>
               
               <td>Mary</td>
               <td>Moe</td>
               
             </tr>
           </tbody>
         </table>
      
          </div>
        </div>
      </div>
  

    <footer class="container-fluid text-center" style="margin-top: 235px;">
  <p>© 2018 CONNECT</p>
</footer>
</body>
</html>
