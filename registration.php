<?php
include_once('header.php');
?>


<?php include('functions.php') ?>



<div class="container">
    <div class="col-sm-2 sidenav" id="main">
        <div id="main1">
        <p style="color:#FF7A00; font-weight: bold; font-size: 23px; text-align: center; padding-top: 15px;">Connect</p>
        <p style="text-align: center; color: #95989A; font-size: 10px; padding-left: 40px; padding-right: 40px;">Sign up to buy/sell fresh products 
    with no middle men involved.</p>
        
        <a href="https://www.facebook.com"><img src="img/fb.png" width="200px" height="35px" style="margin-left: 25px; margin-bottom: 10px;" /></a> 
        <p style="text-align: center;"> --------------------or-------------------</p>
      <form method="post" action="registration.php">
      
      <?php echo display_error(); ?>
      <input type="text" placeholder="Full Name" name="name" value ="<?php echo $username; ?>" required>
  
    <input type="text" placeholder="Email" name="email" value ="<?php echo $email; ?>" required>
    
    <input type="password" placeholder="Password" name="password_1" required>
    <input type="password" placeholder="Confirm Password" name="password_2" required>
 
        <select name="district" style="width: 160px; height: 28px;color: grey;" required>
            <option value="">District Name</option>
            <option value="dhaka">Dhaka</option>
            <option value="chittagong">Chittagong</option>
            <option value="rajshahi">Rajshahi</option>
            <option value="sylhet">Sylhet</option>
            <option value="khulna">Khulna</option>
            <option value="barisal">Barisal</option>
        </select>
    
    <select name="user_type" style="width: 160px; height: 28px;color: grey;" required>
            <option value="">Register as a</option>
            <option value="seller"> Seller </option>
            <option value="buyer"> Buyer </option>
        </select>
    
    <br>
    <button type="submit" name="register_btn" class="btn">Register</button>
    <p style="text-align: center; padding-top: 3px;">
			Already a member? <a href="login.php">Sign in</a>
		</p>
  
</form>
      
</div>
</div>