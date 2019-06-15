<?php
include_once('header.php');
?>
<?php include('functions.php') ?>

<div class="container">
  <div class="row">
    <div class="col-md-7">

    </div>
    <div class="col-md-5">
        <div class="row">
          <div class="col-md-6">
            <h2 class="text-left">Registration Form</h2>
          </div>
          <div class="col-md-6">
            <span class="glyphicon glyphicon-pencil"></span>
          </div>
        </div>
          <hr />
          
            <form method="post" action="registration.php">
              <?php echo display_error(); ?>
              <div class="row">
                <label class="label col-md-2 control-label">Full Name</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" placeholder="Enter name" name="name" value ="<?php echo $username; ?>" required>
                </div>
              </div>
              <div class="row">
                <label class="label col-md-2 control-label">Email</label>
                <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Enter Email" name="email" value ="<?php echo $email; ?>" required>
                </div>
              </div>
              <div class="row">
                <label class="label col-md-2 control-label">Password</label>
                <div class="col-md-10">
                <input type="password" class="form-control" placeholder="Password" name="password_1" required>
                </div>
              </div>
              <div class="row">
                <label class="label col-md-2 control-label">Confirm</label>
                <div class="col-md-10">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_2" required>
                </div>
              </div>
              <div class="row">
                <label class="label col-md-2 control-label">District</label>
                <div class="col-md-10">
                <select name="district" class="form-control" required>
                    <option value=""> - </option>
                    <option value="dhaka">Dhaka</option>
                    <option value="chittagong">Chittagong</option>
                    <option value="rajshahi">Rajshahi</option>
                    <option value="sylhet">Sylhet</option>
                    <option value="khulna">Khulna</option>
                    <option value="barisal">Barisal</option>
                </select>
                </div>
              </div>
              <div class="row">
                <label class="label col-md-3 control-label">Register as </label>
                <div class="col-md-9">
                <select name="user_type" class="form-control" required>
                    <option value=""> - </option>
                    <option value="seller">seller</option>
                    <option value="buyer">buyer</option>
                    <option value="admin">Admin</option>
                </select>
                </div>
              </div>
              
              <button type="submit" name="register_btn" class="btn btn-info">Register</button>

              <div class="row">
                <p class="lead text-center">
                  Already have account? Login now.<br><a href="login.php">
                  <strong>Login Here</strong></a>
                </p>
              </div>
              
            </form>
 
      </div>
          </div>
        </div>
    </div>
      









</div>
</div>