<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	
	if (strlen($_SESSION['id'] == 0)) {
	  	header('Location: login.php');
	} else {

		if(isset($_POST['change'])) {
			$userid = $_SESSION['id'];
			$pword = $_POST['pword'];
			$phash = md5($pword);
			$npword = $_POST['npword'];
			$cpword = $_POST['cpword'];
			$hash = md5($npword);
			
			if(!empty($pword) && !empty($npword) && !empty($cpword)) {
				$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$userid'");
				$row = mysqli_fetch_assoc($query);
				$fetchpassword = $row['pword'];

				if (!($fetchpassword === $phash)) {
					echo "<script>alert('Current password is incorrect.');</script>";
					echo "<script>window.location.href='change-password.php'</script>";
				
				} 

				elseif(strlen($npword) < 6) {
					echo "<script>alert('Password must be 6 characters or more.');</script>";
					echo "<script>window.location.href='change-password.php'</script>";
				}

				else {

					if(!($npword === $cpword)) {
						echo "<script>alert('Password doesn't match.');</script>";
						echo "<script>window.location.href='change-password.php'</script>";
					} else {
				
						$sql = "UPDATE users SET pword = '$hash' WHERE id = '$userid'";
						$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
						
						if($result) {
							echo "<script>alert('You have successfully reset password');</script>";
							echo "<script>window.location.href='dashboard.php'</script>";
						}
					}
				}

			}

		}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STYX Finance Tracker || Change Password</title>
	<!-- Font Awesome -->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<style type="text/css">
		.panel {
			-webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
			box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
			border: 0;
			font-weight: 400;
		}

	</style>
</head>

<body>

	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Change Password</li>
			</ol>
		</div>
		
		<div class="container">
			<div class="row" style="margin-top: 30px;">
				<div class="col-lg-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">Change Password</div>
						<div class="panel-body">
							<div class="col-md-12">
								<form role="form" method="post" action="">
									<div class="form-group">
										<label>Current Password</label>
										<input type="password" name="pword" class="form-control" value="" required="true">
									</div>

									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="npword" class="form-control" value="" required="true">
									</div>
									
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="cpword" class="form-control" value="" required="true">
									</div>
									
									<div class="form-group has-success">
										<button type="submit" class="btn btn-primary" name="change">Change</button>
									</div>
									
									
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			
				<?php include_once('includes/footer.php');?>
			</div>
		</div>

	
	</div>
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>

<?php } ?>