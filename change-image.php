<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	
	if (strlen($_SESSION['id'] == 0)) {
		header('location:login.php');
  	} else {
    
	    if(isset($_POST['update'])) {

	        $imgfile = $_FILES["postimage"]["name"];

	        // Get the image extension
	        $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));

	        // Allowed extensions
	        $allowed_extensions = array(".jpg","jpeg",".png",".gif");

	        // Validation for allowed extensions .in_array() function searches an array for a specific value.
	        if(!in_array($extension,$allowed_extensions)) {
	            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
	        } else {

	            // Rename the image file
	            $imgnewfile = md5($imgfile).$extension;

	            // Move image into directory
	            move_uploaded_file($_FILES["postimage"]["tmp_name"],"profileimages/".$imgnewfile);

	            $userid = $_SESSION['id'];

	            $query = mysqli_query($conn,"UPDATE users SET image = '$imgnewfile' WHERE id = '$userid'");
	            if($query) {
	                echo "<script>alert('Profile Image has been updated.');</script>";
					echo "<script>window.location.href='profile.php'</script>";
	            } else {
	                echo "<script>alert('Something went wrong, please try again.');</script>";
					echo "<script>window.location.href='change-image.php'</script>";    
	            } 
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
						
						<div class="col-md-12">
							
							<?php
								$userid = $_SESSION['id'];
								$ret = mysqli_query($conn,"SELECT * FROM users WHERE id = '$userid'");
								$cnt = 1;
								while ($row = mysqli_fetch_array($ret)) {
							?>

							<form role="form" method="post" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label>Current Profile Image</label>
									<img src="profileimages/<?php echo htmlentities($row['image']);?>" width="300" class="img-responsive">
								</div>
								
								<div>
									<label>New Profile Image</label>
									<input type="file" class="form-control" name="postimage" required>
								</div>
								
								<br>

								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="update">Update</button>
								</div>
								
								
								</div>
								<?php } ?>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php include_once('includes/footer.php');?>
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
<?php }  ?>