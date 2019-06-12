<link rel="stylesheet" href="css/css5.css">
<link rel="stylesheet" href="css/w3.css">

<?php include_once('connection.php'); ?>


<?php session_start(); ?>
<?php


if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($db, $_POST["query"]);
	$query = "
	SELECT products.pid, products.pname, category.name, products.avaiquantity, products.minquantity, products.pprice, products.path, users.username, users.district FROM products, users, category
	WHERE users.id = products.userid
        AND category.id = products.pcategoryid
        AND(products.pname LIKE '%".$search."%'
	OR users.district LIKE '%".$search."%')
	";
}
else
{
	$query = "SELECT products.pid,products.pname, category.name, products.avaiquantity, products.minquantity, products.pprice, products.path, users.username, users.district FROM users,products,category WHERE users.id = products.userid AND category.id = products.pcategoryid ORDER BY RAND()";

}
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_array($result))
	{
		$prod_id = $row['pid'];
		$pro_name = $row['pname'];
		$pro_category = $row['name'];
		$pro_avq = $row['avaiquantity'];
		$pro_minq = $row['minquantity'];
		$pro_price = $row['pprice'];
		$pro_seller = $row['username'];
		$pro_district = $row['district'];
		$pro_image = $row['path'];
		echo "
			<div class='col-sm-4 products-item' id='prod1' >
           <img src='".$pro_image."'style='width:180px; height:130px'/>
           <p style='font-size: 14px;'><b>$pro_name</b></p>
           <p style='font-size: 14px;'> <b>Category:</b>.$pro_category</p>
           <p style='font-size: 14px;'> <b>Available Quantity:</b>.$pro_avq</p>



           <p style='font-size: 14px;'> <b>Per KG Price:</b>.$pro_price</p>

           <p style='font-size: 14px;'> <b>District:</b>.$pro_district</p>

           <p style='font-size: 14px;'> <b>Seller Name:</b>.$pro_seller</p>
           <p style='font-size: 14px;'> <b>Min Order: </b>.$pro_minq</p>

           <button pid='$prod_id'  class='btn btn-primary'  type='button' id='product'><b>AddtoCart</b></button>
              </div>";


}}
else
{
	echo 'Data Not Found';
}
?>
<?php
if(isset($_POST["addtoCart"])){
	$p_id = $_POST["prodId"];
	$user_id = $_SESSION["user_id"];
	$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
	$run_query = mysqli_query($db,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0) {
		echo "Product is already added into the cart! Continue Shopping";


	} else {
		$sql = "SELECT * FROM products WHERE pid = '$p_id'";
		$run_query = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($run_query);
		$id = $row["pid"];
		$pro_name = $row["pname"];
		$pro_image = $row["path"];
		$pro_price = $row["pprice"];
		$pro_quant = $row["minquantity"];
		$sql = "INSERT INTO `cart` (`o_id`, `p_id`, `ip_add`, `user_id`, `produc_ttitle`,
			 `product_image`, `qty`, `price`, `total_amt`)
		 VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '$pro_quant', '$pro_price', '$pro_price');";
		 if(mysqli_query($db,$sql)){
			 echo "
			 	<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' arial-label='close'>&times; </a>
				<b>Product is added.! </b>
				</div>";
		 }
	}
}
?>



<script>
$("body").delegate("#product","click",function(event) {
	event.preventDefault();

	 var p_id = $(this).attr('pid');
	 $.ajax({
		 url : "product_fetch.php",
		 method : "POST",
		 data : {addtoCart: 1, prodId: p_id},
		 success : function(data){

			 	alert('product has been sucessfully added!!');

		 }
	 })

});
</script>
<script>
$("body").delegate("#cart_container","click",function(event){

	event.preventDefault();


	$.ajax({

 		 url : "mycart.php",
 		 method : "POST",
 		 data : {get_cart_product: 1},
 		 success : function(data){

 			 $("#cart_product").html(data);

 		 }
	})

});
cart_checkout();
function cart_checkout(){
	$.ajax({
		url : "mycart.php",
		method : "POST",
		data : {cart_checkout:1},
		success : function(data) {
			$("#cart_checkout").html(data);
		}
	})
}

$("body").delegate(".remove","click",function(event){
	event.preventDefault();
	var pid = $(this).attr("remove_id");
	$.ajax({
		url : "item_list.php",
		method : "POST",
		data : {removeFromCart: 1, removeId: pid},
		success : function(data){
			alert(data);
		}
	})
})
</script>
