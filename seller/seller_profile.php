
<?php include_once('connection.php'); ?>
<?php
		$query = "SELECT * FROM users";
		$result = mysqli_query($db, $query);

		if(mysqli_num_rows($result)>0{
			$row = mysqli_fetch_assoc($result);
			if($row['username']==$_SESSION['username']){
				echo $row['username'];
			}
			else
				echo "0";
		}
