<?php
	session_start();
	include('config.php');

	if(isset($_POST['register'])) {
		
		$errors = array();

		$fname = trim($_POST['fname']);
		$email = trim($_POST['email']);
		$phone = trim($_POST['phone']);
		$pword = trim($_POST['pword']);
		$hash = md5($pword);
		$cpword = trim($_POST['cpword']);
		$image = "ebcd036a0db50db993ae98ce380f6419.png";

		if (empty($email) || empty($fname) || empty($pword) || empty($cpword)  || empty($phone)) {
			$errors['empty'] = '**All fields are required';
			header("Location: ../signup.php");
		}
		elseif (!preg_match("/^[ a-zA-Z ]*$/", $fname)) {
			$errors['fname'] = 'INVALID NAME FORMAT: LETTERS AND WHITESPACES ONLY';
			header("Location: ../signup.php");
		}
		elseif (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,10})$/", $email)) {
			$errors['email'] = 'INVALID EMAIL FORMAT';
			header("Location: ../signup.php");
		} 
		elseif (!preg_match("/^([0-9]{11})$/", $phone)) {
			$errors['number'] = 'PHONE NUMBER: INVALID FORMAT; PLEASE FILL IN 11 DIGITS';
			header("Location: ../signup.php");
		}
		elseif ($pword !== $cpword) {
			$errors['password'] = 'PASSWORDS DO NOT MATCH';
			header("Location: ../signup.php");
		}
		else {
	    	$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($conn));

			if(mysqli_num_rows($query) > 0) {
				$errors['email'] = '**Email already exists';
				header("Location: ../signup.php");
			} else {
		    	
		    	$sql = "INSERT INTO users (fname, email, phone, pword, image) VALUES('$fname', '$email', '$phone', '$hash', '$image')";
		    	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		    	
		    	if($result) {
		    		$_SESSION['success'] = "You have successfully registered, Please login";
		    		header("Location: ../login.php");
		    	}
	    	}
	    }
	    
	    if(count($errors) > 0) {
	    	$_SESSION['errors'] = $errors;
	    	exit;
		} else {
		    
		    unset($_SESSION['errors']);
		}
	}



	/*====== Authentication for Sign In ======*/
	if (isset($_POST['login'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$en_password = md5($password);

		$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pword = '$en_password' ");
		$count = mysqli_fetch_assoc($result);
		
		if($count > 0) {
		    $_SESSION['login'] = $_POST['email'];
		    $_SESSION['id'] = $count['id'];
		    header("Location: ../dashboard.php");
		    exit();
		
		} else {
		    $_SESSION['invalid'] = "Invalid username or password";
		    header("Location: ../login.php");
		    exit();
		}
	}

?>