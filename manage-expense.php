<?php  
	session_start();
	error_reporting(0);
	include('includes/config.php');
	
	if (strlen($_SESSION['id'] == 0)) {
  		header('location:login.php');
  	} else {

		if(isset($_GET['delid'])) {

			$rowid = intval($_GET['delid']);
			$query = mysqli_query($conn,"DELETE FROM tblexpense WHERE ID = '$rowid' ");
			
			if($query) {
				echo "<script>alert('Record successfully deleted');</script>";
				echo "<script>window.location.href='manage-expense.php'</script>";
			} else {
				echo "<script>alert('Something went wrong. Please try again');</script>";
			}

		}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STYX Finance Tracker || Manage Expense</title>
	<!-- Font Awesome -->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
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
				<li class="active">Manage-Expense</li>
			</ol>
		</div>
		
		<div class="container">
			<div class="row" style="margin-top: 30px;">
				<div class="col-lg-12">
				
					<div class="panel panel-default">
						<div class="panel-heading">Manage-Expense</div>
						<div class="panel-body">
							<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?></p>
						<div class="col-md-12">
								
						<div class="table-responsive">
							<table class="table table-bordered mg-b-0">
								<thead>
									<tr>
										<th>S.NO</th>
										<th>Expense Item</th>
										<th>Expense Cost (₦)</th>
										<th>Expense Date</th>
										<th>Action</th>
									</tr>
								</thead>

								<?php
									$userid = $_SESSION['id'];
									$ret = mysqli_query($conn,"SELECT * FROM tblexpense WHERE UserId = '$userid' ");
									$cnt=1;
									while ($row = mysqli_fetch_array($ret)) {
								?>

								<tbody>
									<tr>
										<td><?php echo $cnt;?></td>
										<td><?php echo $row['ExpenseItem'];?></td>
										<td><?php echo number_format($row['ExpenseCost'], 2);?></td>
										<td><?php echo $row['ExpenseDate'];?></td>
										<td>
											<a href="manage-expense.php?delid=<?php echo $row['ID'];?>">Delete</a>
										</td>
									</tr>
									
									<?php $cnt = $cnt+1; } ?>

			              		</tbody>
			            	</table>

			          	</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include_once('includes/footer.php');?>
		
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