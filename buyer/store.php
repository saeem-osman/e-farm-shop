<?php
  include('../functions.php');

  if (!isLoggedIn() || !isBuyer($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>
<?php include_once('buyer_header.php'); ?>
</head>
<body >


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6" style="margin-left: 35px;">

      </div>

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
<!--
<div class="example col-md-4">
  <h3 style="text-align: center;"><b>Great!</b></h3>

</div>

<!--
<div class="p_msgg" id="product_msg" style="position: absolute">
</div>
        <div class="example col-md-4" id = "foo">
          <h3 style="text-align: center;"><b>My cart </b></h3>
          <p> Item Name: </p>
          <p> Seller Name: </p>
          <p> Unit Price: </p>
          <p> Seller Adress: </p>
          <p> Delivery Address: </p>
          <p> Total Amount: </p>
          <p><button>Confirm Order </button> <button> Cancel </button>


        </div>
        <style>
        .example{
          margin-top: 200px;

            height: auto;
            width: 300px;
            border: 1px solid black;
            border-radius: 15px;
            background-color: 	#F0E68C;
            display: none;
        }
        </style>


<!--      </div>


    </div>


-->


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
