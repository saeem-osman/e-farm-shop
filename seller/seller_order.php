<?php
  include('../functions.php');

  if (!isLoggedIn() || !isSeller($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>
<?php include_once('seller_header.php'); ?>
 

<div class="container-fluid">
  <div class="row content">


      <div class="col-sm-9"style="margin-left: 80px;" >
        <h4 style="color: #FF7A00; font-size: 20px;"><b>My Orders</b></h4>
      <hr>
      <table class="table table-striped table-bordered">
           <thead>
             <tr>
                 <th>Customer Name</th>
               <th>District</th>
               <th>Product</th>
               <th>Quantity</th>
               <th>Date</th>
               <th>Phone Number / Email</th>
               <th>Total</th>
               <th>Payment Status</th>
               <th>Product Received</th>

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

               <td><b>Pending</b></td>


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

               <td><b>Pending</b></td>

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

               <td><b>Pending</b></td>

             </tr>
           </tbody>
         </table>

          </div>
        </div>
      </div>


<footer class="container-fluid text-center" style="margin-top: 300px;">
  <p>© 2018 CONNECT</p>
</footer>
</body>
</html>
