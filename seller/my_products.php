<?php
  include('../functions.php');

  if (!isLoggedIn() || !isSeller($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
  ob_start();
?>
<?php include_once('seller_header.php'); ?>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-7" style="margin-left: 35px;">
        <h4 style="color: #FF7A00; font-size: 20px;"><b>My Products</b></h4>
      <hr>
         <?php
      $user = $_SESSION['user_id'];
      global $db;

    $sql = "SELECT products.pid, products.pname, products.pcategoryid, products.avaiquantity, products.minquantity, products.pprice, products.path, users.username, users.district FROM users,products WHERE users.id = products.userid AND id ='$user'";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));
if ($result && $result->num_rows > 0) {
    while($rws = mysqli_fetch_array($result)){
          $prod_id = $rws['pid'];

?>

              <div class="col-sm-4 products-item" id="prod1" >
                            <a href="#">
             <?php echo "<img src='../".$rws['path']."'width='160' height='110' />"; ?>
                        </a>
              <p style="font-size: 14px;"> <b><?php echo $rws['pname']; ?></b></p>
                  <p style="font-size: 14px;"> <b>Category id:</b><?php echo $rws['pcategoryid']; ?></p>
                  <p style="font-size: 14px;"><b>Available Quantity:</b><?php echo $rws['avaiquantity']; ?></p>
                  <p style="font-size: 14px;"> <b>Per KG Price:</b><?php echo $rws['pprice']; ?> Taka</p>
                  <?php echo "
                  <a href='my_products.php?delete={$prod_id}' class='btn btn-danger'><strong>Delete</strong></a> "; ?>
              </div>

           <?php }
          } ?>



      <br>
    </div>

      <div class="col-sm-4" style="margin-left: 40px;">
        <h4 style="color: #FF7A00; font-size: 20px;"><b>Add New Product</b></h4>
      <hr>

      <form enctype="multipart/form-data" class="form col-sm-9" style="margin-left: 45px; margin-right: 25px;" action="my_products.php" method="post">


          <label for="name"><b>Product Name :</b></label>
          <input class="form-control" name="name" placeholder="name" type="text"
                  required> <br>

           <label for="type"><b>Type :</b></label>
           <select class="form-control" name="category" required>
            <option value="Vegetable">Vegetable</option>
            <option value="Fruit"> Fruit </option>
            <option value="Spice"> Spice </option>
            </select><br>

           <label for="quantity"><b> Available Quantity :</b></label>
           <input class="form-control" name="avquantity" placeholder="Available Quantity" type="text"
                   required > <br>
           <label for="quantity"><b> Minimum Quantity :</b></label>
           <input class="form-control" name="minquantity" placeholder="Minimum Quantity" type="text"
                   required > <br>

           <label for="price"><b>Price Per KG :</b></label>
           <input class="form-control" name="price" placeholder="price" type="number"
                  required> <br>
            <label for="image"><b>Upload Image</b></label>
            <input class="form-control" name="image" id="fileToUpload"  type="file"
                         required> <br>




            <input class="btn btn-default pull-right pay"  type="submit" name="submit" value="Add Product">

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
  if(isset($_GET['delete'])){
    global $db;
    $product_id = $_GET['delete'];
      $query = "DELETE FROM products WHERE pid='$product_id' ";
      $result = mysqli_query($db,$query);
      if(!$result){
        die("mysqli error" . mysqli_error());
      }else{
      header("Location: my_products.php");
      ob_enf_fluch();
      }
  }

?>

<?php
  if(isset($_POST['submit'])){
    switch ($_FILES['image']["error"]) {
        case UPLOAD_ERR_OK:
          # code...
        $target = "img/";
        $target .= basename($_FILES['image']['name']);
        $uploadOk;
        if(move_uploaded_file($_FILES['image']['tmp_name'],'../'. $target)){
          $status = "The file" . basename($_FILES['image']['name']) . " has been uploaded";
          $imageFileType = pathinfo($target, PATHINFO_EXTENSION);
          $check = getimagesize($target);
          if($check !== false){
            //echo "File is an image - " .$check["mime"] ."<br>";
            $uploadOk = 1;
          }else{
            //echo "File is not an image <br>";
            $uploadOk = 0;
          }
        }else{
          $status = "Sorry there was a problem uploading your file";
        }
          break;
        default:
          echo "<script>alert('kicchu hoy nai bai')</alert>";
      }

      //uploading to database
      $user = $_SESSION['user_id'];
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
    $first_query = "SELECT * FROM users WHERE id='$user' ";
    $val = mysqli_query($db,$first_query);
    if(!$val){
      die("error" . mysqli_error());
    }
    $data = mysqli_fetch_assoc($val);
    $address = $data['address'];

    $sql_query = "INSERT INTO products VALUES ('$user', DEFAULT, '$name', '$categoryid', '$avquantity', '$minquantity', '$price', '$target', '$address')";
    $result = mysqli_query($db, $sql_query);
    if(!$result){
      echo "<script>alert('There was an error uploading imaage.')</script>";
    }else{
      echo "<script>alert('Upload successfull.')</script>";
      header('location: my_products.php');
    }

    }
?>


<!--     $user = $_SESSION['user_id'];
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

    $sql_query = "INSERT INTO products VALUES ('$user',DEFAULT,'$name','$categoryid','$avquantity','$minquantity','$price','$target')";

    $result = mysqli_query($db, $sql_query);
    if(!$result){
      echo "<script> alert('There was error uploading') </script>";
    }else{
      echo "<script>alert('Uploaded')</script>";
    }

  }else{
    echo "<script>alert('error')</script";

  }
  } -->




<?php



// if (isset($_POST['submit'])) {
//      $user = $_SESSION['user_id'];
//     $name = $_POST['name'];
// 		$avquantity = $_POST['avquantity'];
//     $minquantity = $_POST['minquantity'];
// 		$category = $_POST['category'];
// 		if($category=='Fruit')
// 			$categoryid = 3;
// 		if($category=='Vegetable')
// 			$categoryid = 2;
// 		if($category=='Spice')
// 			$categoryid = 4;

// 		$price = $_POST['price'];
               
     

//     // checking if the file is submitted
     

   
//             $target_dir = "img/";
//             $path = $target_dir . basename($_FILES["image"]["name"]);
                
     
            
                
//     $sql_query = "INSERT INTO products VALUES ('$user',DEFAULT,'$name','$categoryid','$avquantity','$minquantity','$price','$path')";

 


//     if (mysqli_query($db, $sql_query)) {
//         echo "<script>alert('Uploaded')</script>";
     
//     } 
// }


?>
