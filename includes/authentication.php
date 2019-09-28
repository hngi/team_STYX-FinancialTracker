<?php
	session_start();
	include('config.php');

	if(isset($_POST['register'])) {
		
		$errors = array();

		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$pword = $_POST['pword'];
		$hash = md5($pword);
		$cpword = $_POST['cpword'];
		$image = "ebcd036a0db50db993ae98ce380f6419.png";

		if(empty($fname) || empty($email) || empty($phone) || empty($pword) || empty($cpword)){
			$errors['empty'] = '**All fields are required';
			header("Location: ../signup.php");
		}

		elseif(!($pword === $cpword)) {
			$errors['password'] = '**Passwords do not match';
			header("Location: ../signup.php");
		}
		
		elseif(strlen($pword) < 6) {
		    $errors['pass_leng'] = "Password must be 6 characters or more ";
		    header("Location: ../signup.php");
		}

		elseif(!preg_match('/^[0-9]*$/', $phone)) {
			$errors['number'] = '**Invalid Phone Number!';
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
		    		$_SESSION['success'] = "You have successfully registered, please login";
		    		header("Location: ../login.php");
		    	}
	    	}
	    }
	    
	    if(count($errors) > 0) {
	    	$_SESSION['errors'] = $errors;
	    	exit;
		} else {
		    // clean up previous validation errors, everything's fine
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