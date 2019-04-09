<?php
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'multi-login');

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array();

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	//call the edit_name function if save btn is clicked

	if (isset($_POST['edit_name'])) {
		edit_name();
	}
	//call the edit_email
	if (isset($_POST['edit_email'])) {
		edit_email();
	}
	//call the edit_email
	if (isset($_POST['edit_phone'])) {
		edit_phone();
	}
	//call the edit_district function if
	if (isset($_POST['edit_district'])) {
		edit_district();
	}
	//call the edit_password funciton
	if (isset($_POST['edit_password'])) {
		edit_password();
	}
	//product upload function
	if (isset($_POST['product_upload'])) {
		product_upload();
	}


	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['name']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);
        $district    =  e($_POST['district']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
        if (empty($district)) {
			array_push($errors, "District is required");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password, district)
						  VALUES('$username', '$email', '$user_type', '$password', '$district')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: admin_home.php');
			}else{
				$query = "INSERT INTO users (username, email, user_type, password,district)
						  VALUES('$username', '$email', 'user', '$password','$district')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
                if (isset($_POST['user_type'])=='seller'){
                    header('location: seller_home.php');
                }
                else
				header('location: buyer_home.php');
			}

		}

	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$email = e($_POST['email']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($email)) {
			array_push($errors, "email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: admin_home.php');
				}
                elseif ($logged_in_user['user_type'] == 'seller') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: seller_home.php');
				}
                elseif($logged_in_user['user_type'] == 'buyer') {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: buyer_home.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	//function for edit_name
	function edit_name(){
		global $db, $errors;

		// receive all input values from the form
		$username    =  e($_POST['name']);

		$id = $_SESSION['user']['id'];
		$_SESSION['success']  = "";



		// form validation: ensure that the form is correctly filled
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (count($errors) == 0) {

				$query = "UPDATE users SET username='$username' WHERE id='$id'";

				mysqli_query($db, $query);

				header('location: editseller.php');
		}
	}
	//edit district
	function edit_district(){
		global $db, $errors;

		// receive all input values from the form
		$district    =  e($_POST['district']);

		$id = $_SESSION['user']['id'];
		$_SESSION['success']  = "";



		// form validation: ensure that the form is correctly filled
		if (empty($district)) {
			array_push($errors, "District is required");
		}
		if (count($errors) == 0) {

				$query = "UPDATE users SET district='$district' WHERE id='$id'";

				mysqli_query($db, $query);

				header('location: editseller.php');
		}
	}
	//edit phone
	function edit_phone(){
		global $db, $errors;
		// receive all input values from the form
		$phone    =  e($_POST['phone']);
		$id = $_SESSION['user']['id'];
		$_SESSION['success']  = "";
		// form validation: ensure that the form is correctly filled
		if (empty($phone)) {
			array_push($errors, "phone is required");
		}
		if (count($errors) == 0) {

				$query = "UPDATE users SET phone='$phone' WHERE id='$id'";

				mysqli_query($db, $query);

				header('location: editseller.php');
		}
	}
	//edit_email
	function edit_email(){
		global $db, $errors;
		// receive all input values from the form
		$email    =  e($_POST['email']);
		$id = $_SESSION['user']['id'];
		$_SESSION['success']  = "";
		// form validation: ensure that the form is correctly filled
		if (empty($email)) {
			array_push($errors, "email is required");
		}
		if (count($errors) == 0) {

				$query = "UPDATE users SET email='$email' WHERE id='$id'";

				mysqli_query($db, $query);

				header('location: editseller.php');
		}
	}
	//edit password
	function edit_password(){
		global $db, $errors;
		$_SESSION['success']  = "";

		// receive all input values from the form

		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);
		$id = $_SESSION['user']['id'];


		// form validation: ensure that the form is correctly filled

		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

		$query = "UPDATE users SET password='$password' WHERE id='$id'";

				mysqli_query($db, $query);

				header('location: editseller.php');
		}
	}
	//product uploading
	

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

    //check if admin

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

    //check if seller

    function isSeller()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'seller' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>
