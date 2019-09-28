<?php
	include('includes/config.php');

	if(isset($_POST['reset'])) {
		$email = $_POST['email'];
		$npword = $_POST['npword'];
		$cpword = $_POST['cpword'];
		$hash = md5($npword);
		
		if(!empty($email) && !empty($npword) && !empty($cpword)) {
			$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
			
			if(mysqli_num_rows($query) == 0) {
				$_SESSION['error'] = "Email does not exist";
				session_unset();
			}
			
			elseif(!($npword === $cpword)) {
				$_SESSION['error'] = "Passwords do not match!";
				session_unset();
			}

			elseif(strlen($npword) < 6) {
			    $_SESSION['error'] = "Password must be 6 characters or more ";
			    session_unset();
			}

			else {
		
				$sql = "UPDATE users set pword = '$hash' WHERE email = '$email'";
				$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
				
				if($result) {
					$_SESSION['success'] = "You have successfully reset your password. <a href='login.php'>Click here to login</a>";
					session_unset();
				}
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>STYX Finance Tracker || Reset Password</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
</head>

<body style="background-color: #071739;">

	<div class="container">
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-6">
				
				<?php
					if(isset($_SESSION['error'])){
						echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
					}
				?>

				<?php
					if(isset($_SESSION['success'])){
						echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
					}
				?>

				<div class="card">
					<form class="p-5" method="post" action="">
						<p class="h4 mb-4 text-center">Reset Password</p>

						<label for="New Password">Email Address</label>
						<input type="email" id="exampleForm2" class="form-control mb-4" placeholder="Enter registered email" name="email" required>
						
						<label for="New Password">New Password</label>
						<input type="password" id="exampleForm2" class="form-control mb-4" placeholder="Enter new password" name="npword" required>
						
						<label for="Confirm Password">Confirm New Password</label>
						<input type="password" id="exampleForm2" class="form-control mb-4" placeholder="Confirm new password" name="cpword" required>
						
						<button class="btn btn-info btn-block my-4" type="submit" name="reset">Reset</button>
					
					</form>
				</div>
				
			</div>
		</div>
	</div>



<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
</body>
</html>