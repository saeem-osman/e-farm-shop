<?php
include_once('buyer_header.php');
?>
<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'multi-login'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  
  <link rel="stylesheet" href="css/css5.css">
  <link rel="stylesheet" href="css/w3.css">
  <script src="js/jquery.min.js"> </script>

  
</head>
<body >

 
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-7" style="margin-left: 35px;">
        <h4 style="color: #FF7A00; font-size: 20px;"><b>Store</b></h4>
      <hr>
      
     
      <form class="form-inline" style="margin-left: 0px; margin-right: 0px;" method="post">
           <label for="type"><b>Category :</b></label>
           <select class="form-control" required>
               
               <option value="all">All</option>
            <option value="vegetable">Vegetable</option>
            <option value="fruit"> Fruit </option>
            <option value="spice"> Spice </option>
            </select>
           
           &nbsp;&nbsp;&nbsp;
      <label for="search"><b>Search :</b></label>
      <input style="width: 400px;" class="form-control" type="text" name="search" placeholder="search by product name or district.." id="search_text">
             
      </form>
     

      <div id="result">      </div>

         <br>
        
      </div>
     

        </div>
      
  

    <footer class="container-fluid text-center" style="margin-top: 35px;">
  <p>© 2018 CONNECT</p>
</footer>
</body>
</html>
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"product_fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>