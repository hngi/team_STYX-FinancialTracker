<?php
	session_start();
	error_reporting(0);
	include('includes/config.php');
	
	if (strlen($_SESSION['id'] == 0)) {
	  	header('Location: login.php');
	} else {

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STYX Finance Tracker || Dashboard</title>
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
		
		.goal-container {
			background-color: white;
			width: 100%;
			margin: 20px auto;
			padding: 20px 20px;
			border-radius: 5px;
			-webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
			box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
		}
		
		.goal-subcontainer {
			display: grid;
			grid-template-columns: 1fr;
			grid-gap: 20px;	
			padding-bottom: 10px;		
			border-bottom: 1px solid grey;
			margin-bottom: 20px;
		}
		
		.current-goal {
			padding: 0 20px;
		}
		
		.goal-progress {
			float: right;
			font-weight: bolder;
			padding-right: 20px;
			font-size: 1.2em;
		}
		
		.current-goal p span {
			float: right;
		}
		
		@media screen and (min-width: 1000px){
    		.goal-subcontainer {
    			display: grid;
    			grid-template-columns: 8fr 4fr;
    		}	
    		.current-goal {
    			border-left: 1px solid grey;
    			
    		}
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
				<li class="active">Dashboard</li>
			</ol>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header" style="font-weight: 500;">Dashboard</h1>
				</div>
			</div>
			
			
			<!-- #Current goals start here -->
			<div class="row goal-container container">
				<div class="goal-subcontainer">
					<section >
					<?php
						$userid = $_SESSION['id'];
						$query = mysqli_query($conn,"SELECT * FROM goaltracker WHERE userId = '$userid' ORDER BY goalDate DESC ");
						$result = mysqli_fetch_array($query);
						date_default_timezone_set("Africa/Lagos");
						$currentdate = date("Y-m-d");
						$duedate = $result['goalDate'];
						$postdate = $result['postdate'];
						$diff1 = (strtotime($duedate) - strtotime($currentdate))/60/60/24;
						$diff2 = (strtotime($duedate) - strtotime($postdate))/60/60/24;	
						$goal = ($diff2/$diff1) * 100;
						$goalpercent = 100 - $goal;
​
						?> 
​
						<h4 style="font-weight: bold;">Current Goal</h4>
						<p>
						<span class="goal-title text-bold"><?php echo htmlentities($result['goalTitle']); ?> </span>
						<span class="goal-progress text-info"><?php echo ceil($goalpercent); ?>%</span>
						</p>
​
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ceil($goalpercent); ?>%">
							</div>
						</div>
​
					</section>
					<section class="current-goal">
						<p>Goal: <span>&#8358 <?php echo htmlentities($result['goalAmount']); ?></span> </p>
						<p>Due date: <span><?php echo htmlentities($result['goalDate']); ?></span></p>
						<p>Category: <span><?php echo htmlentities($result['goalCategory']); ?></span></p>
					</section>
				</div>
				<a href="manage-goals.php"><input type="button" name="manageGoal" id="manageGoal" value="Manage Goal" class="btn btn-info" style="width: 150px;float: right;"></a>
				<!--#Current goals end here -->
			</div>


				<div class="col-md-4">
					<div class="panel panel-default">
						<?php
							//Yestreday Expense
							$userid = $_SESSION['id'];
							$ydate = date('Y-m-d',strtotime("-1 days"));
							$query1 = mysqli_query($conn,"SELECT sum(ExpenseCost)  AS yesterdayexpense FROM tblexpense WHERE (ExpenseDate) = '$ydate' && (UserId = '$userid');");
							$result1 = mysqli_fetch_array($query1);
							$sum_yesterday_expense = $result1['yesterdayexpense'];
						?> 
						<div class="panel-body easypiechart-panel">
							<h4>Yesterday's Expense (₦)</h4>
							<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $sum_yesterday_expense;?>" >
								<span class="percent">
									<?php if($sum_yesterday_expense == ""){ 
										echo "0";
										} else {
											echo number_format($sum_yesterday_expense);
										}
									?>
								</span>
							</div>
						</div>
					</div>
	            </div>
	            
				<div class="col-md-4">
					<div class="panel panel-default">
						<?php
	                        //Weekly Expense
	                        $userid = $_SESSION['id'];
	                        $pastdate = date("Y-m-d", strtotime("-1 week")); 
	                        $crrntdte = date("Y-m-d");
	                        $query2 = mysqli_query($conn,"SELECT sum(ExpenseCost)  AS weeklyexpense FROM tblexpense WHERE ((ExpenseDate) BETWEEN '$pastdate' AND '$crrntdte') && (UserId = '$userid');");
	                        $result2 = mysqli_fetch_array($query2);
	                        $sum_weekly_expense = $result2['weeklyexpense'];
	                    ?>
						<div class="panel-body easypiechart-panel">
							<h4>Last 7day's Expense (₦)</h4>
	                        <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_expense;?>">
	                        <span class="percent">
	                            <?php if($sum_weekly_expense == ""){ 
	                                echo "0";
	                            } else {
	                                echo number_format($sum_weekly_expense);
	                            }
	                            ?>
	                        </span>
	                    </div>
					</div>
					</div>
	            </div>
	            
				<div class="col-md-4">
					<div class="panel panel-default">
						<?php
	                        //Monthly Expense
	                        $userid = $_SESSION['id'];
	                        $monthdate = date("Y-m-d", strtotime("-1 month")); 
	                        $crrntdte = date("Y-m-d");
	                        $query3 = mysqli_query($conn,"SELECT sum(ExpenseCost)  AS monthlyexpense FROM tblexpense WHERE ((ExpenseDate) BETWEEN '$monthdate' AND '$crrntdte') && (UserId = '$userid');");
	                        $result3 = mysqli_fetch_array($query3);
	                        $sum_monthly_expense = $result3['monthlyexpense'];
	                        ?>
						<div class="panel-body easypiechart-panel">
							<h4>Last 30day's Expenses (₦)</h4>
	                        <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense;?>" >
	                            <span class="percent">
	                                <?php if($sum_monthly_expense == ""){ 
	                                    echo "0";
	                                } else {
	                                    echo number_format($sum_monthly_expense);
	                                }
	                                ?>
	                            </span>
	                        </div>
						</div>
					</div>
				</div>
			
				<div class="col-md-4">
					<div class="panel panel-default">
						<?php
		                    //Yearly Expense
		                    $userid = $_SESSION['id'];
		                    $cyear = date("Y");
		                    $query4 = mysqli_query($conn,"SELECT sum(ExpenseCost)  AS yearlyexpense FROM tblexpense WHERE (year(ExpenseDate) = '$cyear') && (UserId = '$userid');");
		                    $result4 = mysqli_fetch_array($query4);
		                    $sum_yearly_expense = $result4['yearlyexpense'];
	                    ?>
						<div class="panel-body easypiechart-panel">
							<h4>Current Year Expenses (₦)</h4>
	                        <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly_expense;?>" >
	                        <span class="percent">
	                            <?php if($sum_yearly_expense == "") {
	                                echo "0";
	                            } else {
	                                echo number_format($sum_yearly_expense, 2);
	                            }
	                            ?>
	                            </span>
	                        </div>
						</div>				
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-default">
						<?php
	                        //Yearly Expense
	                        $userid = $_SESSION['id'];
	                        $query5 = mysqli_query($conn,"SELECT sum(ExpenseCost) AS totalexpense FROM tblexpense WHERE UserId = '$userid';");
	                        $result5 = mysqli_fetch_array($query5);
	                        $sum_total_expense = $result5['totalexpense'];
	                    ?>
						<div class="panel-body easypiechart-panel">
							<h4>Total Expenses (₦)</h4>
	                        <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total_expense;?>" >
	                            <span class="percent">
	                                <?php if($sum_total_expense == ""){
	                                    echo "0";
	                                } else {
	                                    echo number_format($sum_total_expense, 2);
	                                }
	                                ?>
	                            </span>
	                        </div>
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
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
			});
		};
	</script>
</body>
</html>

<?php }  ?>