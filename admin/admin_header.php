<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Admin Page</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../css/style5.css">
    </head>
    <body>


    	<nav class="navbar navbar-default">
  <div class="container-fluid" id ="nav">
    <div class="navbar-header">
      <a class="navbar-brand" id="logo" href="index.php">Connect</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active" id="link"><a href="index.php">Home</a></li>
      <li><a href="#" id="link">About Us</a></li>

      <li><a href="#" id="link">Support</a></li>
      <li><a href="#" id="link">
              <img src="img/Capture.png" width="17px" height="21px" />
                  বাংলা</a></li>
    </ul>
  </div>
</nav>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><b>Admin Panel</b></h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Sub-Admin</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="admin_home.php">Home</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin_orders.php">Orders</a>

                    </li>
                    <li>
                        <a href="localbuyer.php">Local Buyers</a>
                    </li>
                    <li>
                        <a href="localseller.php">Local Sellers</a>
                    </li>
                </ul>


            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>


                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">

                                <li><a href="admin_profile.php">Admin Name</a></li>
                                <li><a href="admin_profile.php">Profile</a></li>
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>

                </nav>

                        <!-- jQuery CDN -->
         <script src="../js/jquery.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="../js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>

                
