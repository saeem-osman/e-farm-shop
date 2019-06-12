<?php
  include('../functions.php');

  if (!isLoggedIn() || !isBuyer($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>

<?php include_once('buyer_header.php'); ?>
 
<div class="container-fluid">
  

    <div class="col-sm-7" style="margin-left: 40px;">
        <h4 style="color:#FF7A00;font-size: 20px; margin-left: 20px;margin-top: 15px;"><b>Edit Profile</b></h4>
      <hr>
      
      <form role="form" style="margin-left: 65px; margin-right: 25px;" action="editbuyer.php" method="post">
        <?php echo display_error(); ?>
             
        <div class="col-sm-7 form-group" style="margin-right: 100px;">
            <label for="name"><b>Edit Name</b></label>
        
           <input class="form-control" name="name" placeholder="Name" type="text"> <br>
        <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit" name="edit_name" onclick="myFunction()"><b>Save</b></button>
            <script>
        function myFunction() {
        alert("success!"); 
      } 
</script>
            
        </div>
        </div>
      </form>
      <form role="form" style="margin-left: 65px; margin-right: 25px;" action="editbuyer.php" method="post">
        <?php echo display_error(); ?>
         <div class="col-sm-7 form-group" style="margin-right: 100px;">
             <label for="district"><b>Edit District</b></label>
          <input class="form-control" name="district" placeholder="District" type="text"> <br>
        <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit" name="edit_district" onclick="myFunction()"><b>Save</b></button>
            <script>
        function myFunction() {
        alert("success!"); 
      } 
</script>
        </div>
         
         </div>
          </form>
      <form role="form" style="margin-left: 65px; margin-right: 25px;" action="editbuyer.php" method="post">
        <?php echo display_error(); ?>
        <div class="col-sm-7 form-group" style="margin-right: 100px;">
            <label for="email"><b>Edit Email</b></label>
          <input class="form-control"  name="email" placeholder="Email" type="email" ><br>
        <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit" name="edit_email" onclick="myFunction()"><b>Save</b></button>
            <script>
        function myFunction() {
        alert("success!"); 
      } 
</script>
        </div>
        </div>
      </form>
      <form role="form" style="margin-left: 65px; margin-right: 25px;" action="editbuyer.php" method="post">
        <?php echo display_error(); ?>
          <div class="col-sm-7 form-group" style="margin-right: 100px;">
            <label for="number"><b>Edit Phone Number</b></label>
          <input class="form-control"  name="phone" placeholder="Phone Number" type="number" > <br>
        <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit" name="edit_phone" onclick="myFunction()"><b>Save</b></button>
            <script>
        function myFunction() {
        alert("success!"); 
      } 
</script>
        </div>
          
                 </div>
      </form>
           <form role="form" style="margin-left: 65px; margin-right: 25px;" action="editbuyer.php" method="post">
        <?php echo display_error(); ?>     
         <div class="col-sm-7 form-group" style="margin-right: 100px;">
            <label for="password1"><b>Edit password</b></label>
            <input class="form-control"  name="password_1" placeholder="Password"  type="password" > <br>
          <input class="form-control"  name="password_2" placeholder="Re-Type Password" type="password" required> <br>
          <div class="col-sm-12 form-group">
            <button class="btn btn-default pull-right" type="submit" name="edit_password" onclick="myFunction()"><b>Save</b></button>
            <script>
        function myFunction() {
        alert("success!"); 
      } 
</script>
        </div>
        </div> 
        </form>

      </div>
  
      
  </div>

    <footer class="container-fluid text-center" style="margin-top: 235px;">
  <p>© 2018 CONNECT</p>
</footer>
</body>
</html>
