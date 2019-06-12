
<?php
  include('../functions.php');

  if (!isLoggedIn() || !isAdmin($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>
<?php include_once('admin_header.php'); ?>
<?php
  $id = $_SESSION['user_id'];
  global $db;
  $query = "SELECT * FROM users WHERE id='{$id}' ";
  $results = mysqli_query($db, $query);
  if(!$results){
    die("ERror query " .mysqli_error($db));
  }
  $admin_data = mysqli_fetch_assoc($results);
    $admin_name = $admin_data['username'];
    $admin_district = $admin_data['district'];
    $admin_email = $admin_data['email'];
    $admin_phone = $admin_data['phone'];
    $admin_id = $admin_data['id'];

?>


<div class="wrapper">

         <div class="container-fluid">
<div class="row-content">
  <div class="col-sm-6">


      <p style="font-size: 25px; margin-left: 20px;margin-top: 20px;">
          <img src="../img/admin.PNG" width="100" height="100">
        <b><br><?php echo $admin_name; ?></b></p>
    <hr>
    <p style="font-size: 20px;"><b>District:</b> <?php echo $admin_district;  ?></p>
      <p style="font-size: 15px;"><b>Email:</b> <?php echo $admin_email;  ?><br> </p>
      <p style="font-size: 15px;"><b>Phone Number:</b> <?php echo $admin_phone; ?><br></p>
      <p style="font-size: 15px;"><b>Admin Id: </b> <?php echo $admin_id;  ?><br></p>
      <br><br>
  </div>
  </div></div>
      </div>
    </body>
</html>
