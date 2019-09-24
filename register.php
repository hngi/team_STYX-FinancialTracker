<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($host, $username, $password) or die(mysqli_error($con));
$db = mysqli_select_db($con, "finance_tracker") or die(mysqli_error($db));

if(isset($_POST['submit'])){
	$errors = array();

	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$pword = $_POST['pword'];
	$hash = md5($pword);
	$cpword = $_POST['cpword'];

	if(empty($fname) || empty($email) || empty($phone) || empty($pword) || empty($cpword)){
		$errors['empty'] = '**All fields are required';
		header("Location: signUp.php");
	}

	elseif(!($pword === $cpword)){
		$errors['password'] = '**Passwords do not match';
		header("Location: signUp.php");
	}
	elseif(strlen($pword) < 6){
    $errors['pass_leng'] = "Password must be 6 characters or more ";
    header("Location: signUp.php");
	}

	elseif(!preg_match('/^[0-9]*$/', $phone))
    {
     $errors['number'] = '**Invalid Number!';
     header("Location: signUp.php");
    }
    else{
    	$query = mysqli_query($con, "SELECT * FROM register WHERE email = '$email'") or die(mysqli_error($con));

	if(mysqli_num_rows($query) > 0){
		$errors['email'] = '**Email already exists';
		header("Location: signUp.php");
	}
    else{
    	$sql = "INSERT INTO register (fname, email, phone, pword) VALUES('$fname', '$email', '$phone', '$hash')";
    	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
    	if($result){
    		echo "You have successfully signed up, please kindly login";
    		header("Location: login.php");
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

?>