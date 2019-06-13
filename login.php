<?php include('functions.php');
  
  if(isLoggedIn()){
    header('location: index.php');
  }
?>
<?php
include_once('header.php');
?>



  
<div class="container">
    <div class="col-sm-2 sidenav" id="main">
        <div id="main1">
        <p style="color:#FF7A00; font-weight: bold; font-size: 23px; text-align: center; padding-top: 15px;">Connect</p>
        <p style="text-align: center; color: #95989A; font-size: 10px; padding-left: 40px; padding-right: 40px;">Sign up to buy/sell fresh products 
    with no middle men involved.</p>
        
        
      <form method="post" action="login.php">
      <?php echo display_error(); ?>
  
    <input type="text" placeholder="Email or Phone Number" name="email" required>
    <input type="password" placeholder="Password" name="password" required>
    <br>
    
    <button type="submit" class="btn" name="login_btn" style="color: white;font-weight: bold;">Login</button>
    
  
</form>
        <div id="main2">
        <p style="text-align: center;padding-top: 15px;">Don't have any account? Register now.<a href="registration.php">Register</a></p>
 
      </div>
      </div>
      
</div>
</div>
</body>
</html>
