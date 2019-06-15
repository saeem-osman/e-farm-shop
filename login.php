<?php
include_once('header.php');
?>
<?php include('functions.php');
  
  if(isLoggedIn()){
    header('location: index.php');
  }
?>

<div class="container">
  <div class="row">
    <div class="col-md-7">

    </div>
    <div class="col-md-5">
        <div class="row">
          <div class="col-md-6">
            <h2 class="text-left">Login Form</h2>
          </div>
          <div class="col-md-6">
            <span class="glyphicon glyphicon-pencil"></span>
          </div>
        </div>
          <hr />
          
            <form method="post" action="login.php">
              <?php echo display_error(); ?>
              <div class="row">
                <label class="label col-md-2 control-label">E-Mail</label>
                <div class="col-md-10">
                  <input type="email" class="form-control" placeholder="Enter email" name="email" required>
                </div>
              </div>
              <div class="row">
                <label class="label col-md-2 control-label">Password</label>
                <div class="col-md-10">
                  <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                </div>
              </div>
                <button type="submit" class="btn btn-info" name="login_btn">Login</button> 

              <div class="row">
                <p class="lead text-center">
                  Don't have any account? Register now.<br><a href="registration.php">
                  <strong>Register Here</strong></a>
                </p>
              </div>
              
            </form>

 
      </div>
          </div>
        </div>
    </div>
      








</div>
</body>
</html>
