
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css3.css">

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</head>
<body >

<nav class="navbar navbar-default">
  <div class="container-fluid" id ="nav">
    <div class="navbar-header">
      <a class="navbar-brand" id="logo" href="buyerhome.html">Connect</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="buyer_home.php" id="link">Home</a></li>
      <li><a href="editbuyer.php" id="link">Edit Profile</a></li>
      <li><a href="buyer_order.php" id="link">My Orders</a></li>
      <li><a href="store.php" id="link">Store</a></li>
      <li><a href="#"  class="dropdown-toggle" data-toggle="dropdown" id="cart_container"><span class="glyphicon glyphicon-shopping-cart" style: "background-color: white"></span><i style="color: white;">Cart</i><span class="badge" style="color: off-white; background-color: #FF4500">5</span></a>
        <div class="dropdown-menu" style="width: 450px">
          <div class="panel panel-success">

              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-3">Sl. No</div>
                  <div class="col-md-3">Product Image</div>
                  <div class="col-md-3">Product Name</div>
                  <div class="col-md-3">Price in Taka</div>
        </div>
      </div>
      <div class="panel-body">
        <div id="cart_product">
      <!--  <div class="row">
          <div class="col-md-3">Sl. No</div>
          <div class="col-md-3">Product Image</div>
          <div class="col-md-3">Product Name</div>
          <div class="col-md-3">Price in Taka</div>
        </div> -->
</div>
    </div>

</div>
      </li>
      <li><a href="item_list.php" id="link">My Items</a></li>
      <li><a href="logout.php" id="link">Log Out</a></li>
      <li><a href="#" id="link">
              <img src="img/Capture.png" width="17" height="21" />
                  বাংলা</a></li>
    </ul>
  </div>
</nav>
