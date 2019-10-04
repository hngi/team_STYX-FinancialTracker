<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	#For google user
	if(!isset($_SESSION['access_token']))
    {
        header("locaton : login.php");
        exit();
	}
	#Ends here
	
	if (strlen($_SESSION['id'] == 0)) {
		header('location:login.php');
  	} else {
    
    if(isset($_POST['submit'])) {

	    $userid = $_SESSION['id'];
	    $username = $_POST['uid'];
	    $phone = $_POST['phone'];

	    $query = mysqli_query($conn, "UPDATE users SET fname = '$username', phone = '$phone' WHERE id = '$userid' ");
    	if ($query) {
    		$msg = "<div class='text-center' style='color:green;'>User profile has been updated.</div>";
  		} else {
      		$msg = "Something Went Wrong. Please try again.";
    	}
  	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STYX Finance Tracker || User Profile</title>
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
				<li class="active">Profile</li>
			</ol>
		</div><!--/.row-->
				
		<div class="container">
			<div class="row" style="margin-top: 30px">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Profile</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center">
						<?php if($msg){
							echo $msg;
							}
							?>
						</p>
						<div class="col-md-12">
							
							<?php
								$userid = $_SESSION['id'];
								$ret = mysqli_query($conn,"SELECT * FROM users WHERE id = '$userid'");
								$cnt = 1;
								while ($row = mysqli_fetch_array($ret)) {
							?>

							<form role="form" method="post" action="">
								<div class="form-group">
									<label>Fullname</label>
									<input class="form-control" type="text" value="<?php  echo $row['fname'];?>" name="uid" required="true">
								</div>
								
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" value="<?php  echo $row['email'];?>" required="true" readonly="true">
								</div>

								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" class="form-control" name="phone" value="<?php  echo $row['phone'];?>" required="true">
								</div>
								
								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">Update</button>
								</div>
								
								
								</div>
								<?php } ?>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
		</div>
	</div><!--/.main-->
	
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
<?php }  ?>
