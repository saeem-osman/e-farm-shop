<?php
include_once('header.php');
?>
<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="css1.css">
  
  <script src="jquery.js"></script>
  <script src="bootstrap.js"></script>
</head>
<body>

  
<div class="container">
    <div class="col-sm-2 sidenav" id="main">
        <div id="main1">
        <p style="color:#FF7A00; font-weight: bold; font-size: 23px; text-align: center; padding-top: 15px;">Connect</p>
        <p style="text-align: center; color: #95989A; font-size: 10px; padding-left: 40px; padding-right: 40px;">Sign up to buy/sell fresh products 
    with no middle men involved.</p>
        
        <a href="https://www.facebook.com"><img src="img/fb.png" width="200px" height="35px" style="margin-left: 25px; margin-bottom: 10px;" /></a> 
        <p style="text-align: center;"> --------------------or-------------------</p>
      <form method="post" action="login.php">
      <?php echo display_error(); ?>
  
    <input type="text" placeholder="Email or Phone Number" name="email" required>
    <input type="password" placeholder="Password" name="password" required>
    <br>
    
    <button type="submit" class="btn" name="login_btn" style="color: white;font-weight: bold;">Login</button>
    
  
</form>
      </div>
      <div id="main2">
        <p style="text-align: center;padding-top: 5px;">Don't have any account? Register now.<a href="registration.php">Register</a></p>
 
      </div>
</div>
</div>
</body>
</html>