<?php
  include('../functions.php');

  if (!isLoggedIn() || !isBuyer($_SESSION['user'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
  }
?>

<?php include_once('buyer_header.php'); ?>
 


<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h2>Thank you for your purchasing.</h2>
			<p>
				Your requested item will be added to the order list. Stay with us.
			</p>
		</div>
		
	</div>
</div>