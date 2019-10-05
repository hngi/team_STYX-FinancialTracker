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
			$errors['empty'] = 'All fields are required';
			header("Location: ../signup.php");
		}
		elseif (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
			$errors['fname'] = 'Invalid name format: Letters and whitespaces only';
			header("Location: ../signup.php");
		}
		elseif (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,10})$/", $email)) {
			$errors['email'] = 'Invalid email format';
			header("Location: ../signup.php");
		} 
		elseif (!preg_match("/^([0-9]{11})$/", $phone)) {
			$errors['number'] = 'Invalid phone number format: Please fill in 11 digits';
			header("Location: ../signup.php");
		}
		elseif ($pword !== $cpword) {
			$errors['password'] = 'Passwords do not match';
			header("Location: ../signup.php");
		}
		else {
	    	$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'") or die(mysqli_error($conn));
			if(mysqli_num_rows($query) > 0) {
				$errors['email'] = 'Email already exists';
				header("Location: ../signup.php");
			} else {
		    	
		    	$sql = "INSERT INTO users (fname, email, phone, pword, image) VALUES('$fname', '$email', '$phone', '$hash', '$image')";
		    	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		    	
		    	if($result) {
		    		$_SESSION['success'] = "You have successfully registered, please login";
		    		header("Location: ../index.php");
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
		    $_SESSION['invalid'] = "INVALID EMAIL OR PASSWORD";
		    header("Location: ../index.php");
		    exit();
		}

	}
	
	
	/*====== Authentication to check Forgot Password Email ======*/
	require_once "Mail.php"; // PEAR Mail package
    require_once ('Mail/mime.php'); // PEAR Mail_Mime packge
    
	if (isset($_POST['forgot'])) {

	    date_default_timezone_set('Africa/Lagos');
	    $timedate = date('H:i');
	    $hashtimedate = base64_encode($timedate);
	    
		$email = $_POST['email'];
		$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");
		$sql = mysqli_fetch_assoc($result);
		
		if($sql) {
		    echo "<script>alert('A reset link has been sent to your email');
		    window.location.href='../forgot_password.php';</script>";
		    
		    
		    /*======== EMAIL FUNCTION ========*/  	
		    	
		    	$from = "teamstyx@afroblogit.com"; //enter your email address
                $to = "$email"; //enter the email address of the contact your sending to
                $subject = "STYX Finance Tracker"; // subject of your email
                
                $headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);
                
                $text = ''; // text versions of email.
                $html = "<html><body>Hi $email,<br><br>Reset your password using the link below<br><br><a href='http://styx.afroblogit.com/financetracker/reset_password.php?useremail=$email&log=$hashtimedate'>Click here to reset</a><br><br><small>Be in charge of your money</small><br><br>Love,<br>The STYX Team</body></html>"; // html versions of email.
                
                $crlf = "\n";
                
                $mime = new Mail_mime($crlf);
                $mime->setTXTBody($text);
                $mime->setHTMLBody($html);
                
                //do not ever try to call these lines in reverse order
                $body = $mime->get();
                $headers = $mime->headers($headers);
                
                
                $host = "localhost"; // all scripts must use localhost
                $username = "teamstyx@afroblogit.com"; //  your email address (same as webmail username)
                $password = "6g+1FsQh7B1n[O"; // your password (same as webmail password)
                
                $smtp = Mail::factory('smtp', array ('host' => $host, 'auth' => true,
                'username' => $username,'password' => $password));
                
                $mail = $smtp->send($to, $headers, $body);
                
                /*======== EMAIL FUNCTION ========*/
                
                
		
		} else {
		    echo "<script>alert('Email doesn't exist is our database);
		    window.location.href='../forgot_password.php';</script>";
		}

	}
	

?>