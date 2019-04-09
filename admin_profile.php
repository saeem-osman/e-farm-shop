
<?php
  include('functions.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
<?php include_once('admin_header.php'); ?>


<div class="wrapper">

         <div class="container-fluid">
<div class="row-content">
  <div class="col-sm-6">


      <p style="font-size: 25px; margin-left: 20px;margin-top: 20px;">
          <img src="img/admin.PNG" width="100" height="100">
        <b><br>Asiful Hauque</b></p>
    <hr>
    <p style="font-size: 20px;"><b>District:</b> Dhaka</p>
      <p style="font-size: 15px;"><b>Email:</b> mr_rahim@gmail.com<br> </p>
      <p style="font-size: 15px;"><b>Phone Number:</b> 01723456789<br></p>
      <p style="font-size: 15px"><b>Gender:</b> Male<br></p>
      <p style="font-size: 15px;"><b>Admin Id: </b> #00123<br></p>
      <br><br>
  </div>
  </div></div>
      </div>




        <!-- jQuery CDN -->
         <script src="js/jquery.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>

    </body>
</html>
