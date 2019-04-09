<?php include_once('css/css5.php'); ?>
<?php include_once('css/w3.php'); ?>

<?php
$connect = mysqli_connect("localhost", "root", "", "multi-login");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT products.pname, category.name, products.avaiquantity, products.minquantity, products.pprice, products.path, users.username, users.district FROM products, users, category
	WHERE users.id = products.userid
        AND category.id = products.pcategoryid
        AND(products.pname LIKE '%".$search."%' 
	OR users.district LIKE '%".$search."%') 
	";
}
else
{
	$query = "SELECT products.pname, category.name, products.avaiquantity, products.minquantity, products.pprice, products.path, users.username, users.district FROM users,products,category WHERE users.id = products.userid AND category.id = products.pcategoryid ORDER BY RAND()";
        
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<div class="col-sm-4" id="prod1" > 
           <img src="'.$row['path'].'"width="160" height="110" />             
           <p style="font-size: 14px;"><b>'.$row['pname'].'</b></p>
           <p style="font-size: 14px;"> <b>Category:</b>'.$row['name'].'</p>
           <p style="font-size: 14px;"> <b>Available Quantity:</b>'.$row['avaiquantity'].'</p>
           
           
 
           <p style="font-size: 14px;"> <b>Per KG Price:</b>'.$row['pprice'].'</p>
           
           <p style="font-size: 14px;"> <b>District:</b>'.$row['district'].'</p>
           
           <p style="font-size: 14px;"> <b>Seller Name:</b>'.$row['username'].'</p>
           <p style="font-size: 14px;"> <b>Min Order: </b>'.$row['minquantity'].'</p>
           
           <button class="btn btn-default"  type="button"><b>Add to Cart</b></button>
              </div>';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>




