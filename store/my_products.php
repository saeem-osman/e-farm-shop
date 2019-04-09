<?php
  include('functions.php');

  if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
<?php include_once('seller_header.php'); ?>
<?php include_once('connection.php'); ?>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-7" style="margin-left: 35px;">
        <h4 style="color: #FF7A00; font-size: 20px;"><b>My Products</b></h4>
      <hr>

         <?php
      $user = $_SESSION['user']['id'];


    $sql = "SELECT products.pname, products.pcategoryid, products.avaiquantity, products.minquantity, products.pprice, products.path, users.username, users.district FROM users,products WHERE users.id = products.userid AND id ='$user'";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));
if ($result && $result->num_rows > 0) {
    while($rws = mysqli_fetch_array($result)){


?>

              <div class="col-sm-4" id="prod1" >
                            <a href="#">
             <?php echo "<img src='".$rws['path']."'width='160' height='110' />"; ?>
                        </a>
              <p style="font-size: 14px;"> <b><?php echo $rws['pname']; ?></b></p>
                  <p style="font-size: 14px;"> <b>Category id:</b><?php echo $rws['pcategoryid']; ?></p>
                  <p style="font-size: 14px;"><b>Available Quantity:</b><?php echo $rws['avaiquantity']; ?></p>
                  <p style="font-size: 14px;"> <b>Per KG Price:</b><?php echo $rws['pprice']; ?> Taka</p>
              </div>

           <?php }
          } ?>



      <br>
    </div>

      <div class="col-sm-4" style="margin-left: 40px;">
        <h4 style="color: #FF7A00; font-size: 20px;"><b>Add New Product</b></h4>
      <hr>

      <form class="form col-sm-9" style="margin-left: 45px; margin-right: 25px;" action="my_products.php" method="post">


          <label for="name"><b>Product Name :</b></label>
          <input class="form-control" name="name" placeholder="name" type="text"
                  required> <br>

           <label for="type"><b>Type :</b></label>
           <select class="form-control" name="category" required>
            <option value="vegetable">Vegetable</option>
            <option value="fruit"> Fruit </option>
            <option value="spice"> Spice </option>
            </select><br>

           <label for="quantity"><b> Quantity :</b></label>
           <input class="form-control" name="quantity" placeholder="Quantity" type="text"
                   required > <br>

           <label for="price"><b>Price Per KG :</b></label>
           <input class="form-control" name="price" placeholder="price" type="number"
                  required> <br>
            <label for="image"><b>Upload Image</b></label>
            <input class="form-control" name="price" placeholder="price" type="file"
                         required> <br>




            <button class="btn btn-default pull-right pay"  type="submit" name="product_upload"><b>Add Product</b></button>

      </form>

          </div>
        </div>
      </div>


    <footer class="container-fluid text-center" style="margin-top: 35px;">
  <p>© 2018 CONNECT</p>
</footer>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
                 $user = $_SESSION['user']['id'];
                $name = $_POST['name'];
		$avquantity = $_POST['avquantity'];
                $minquantity = $_POST['minquantity'];
		$category = $_POST['category'];
		if($category=='Fruit')
			$categoryid = 3;
		if($category=='Vegetable')
			$categoryid = 2;
		if($category=='Spice')
			$categoryid = 4;

		$price = $_POST['price'];



    // checking if the file is submitted



            $target_dir = "img/";
            $path = $target_dir . basename($_FILES["image"]["name"]);




    $sql_query = "INSERT INTO products VALUES ('$user',DEFAULT,'$name','$categoryid','$avquantity','$minquantity','$price','$path')";




    if (mysqli_query($db, $sql_query)) {
        echo "<script>alert('Uploaded')</script>";

    }
}
?>
