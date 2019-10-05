<?php

	session_start();
	error_reporting(0);
	include('includes/config.php');

	if (strlen($_SESSION['id'] == 0)) {
  		header('location:login.php');

  	} else {

        if (isset($_POST['submit'])) {
            
            
            $userid = $_SESSION['id'];
            $goalTitle = $_POST['goal-title'];
            $goalCategory =$_POST['goal-category'];
            $goalAmount = $_POST['goal-amount'];
            $goalDate = $_POST['goal-date'];

            if(!preg_match('/^[0-9]*$/', $goalAmount)) {
				echo "<script>alert('Please enter a valid amount.');</script>";
				echo "<script>window.location.href='add-expense.php'</script>";

            }
            else {
                $query = mysqli_query($conn, "INSERT INTO goaltracker(userId,goalTitle,goalCategory,goalAmount,goalDate) VALUE ('$userid','$goalTitle','$goalCategory','$goalAmount', '$goalDate')");


                if($query) {
					echo "<script>alert('Goal has been added');</script>";
					echo "<script>window.location.href='dashboard.php'</script>";
			
				} else {
					echo "<script>alert('Something went wrong. Please try again');</script>";
				}
            }
        }

?>



<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>STYX Financial Tracker || Generate Expense Report</title>

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

            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);

			box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);

            border-radius: 5px;

            background-color: white;

            padding: 5px 20px;

            margin-top: 40px;

        }

        .current-goal {

            margin-top: 50px;

        }

        form .form {

            display: grid;

            grid-template-columns: 1fr 1fr;

            grid-gap: 20px;

        }

        form input, form select {

            width: 100%;

            height: 40px;

            margin-top: 10px;

            padding: 0 10px;

        }

        form .btn {

            display: block;
            width: 70%;
            margin: 60px auto;

        }

        .goal-progress {
            float: right;
            font-weight: bolder;
            font-size: 1.2em;

        }

        .addAmount input{
            color: black;
            width: 150px

        }

        .addAmount-btn {
            background-color: rgb(166, 223, 166);
            color: white;
            margin-bottom: 20px;
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
				<li class="active">Manage Goals</li>
			</ol>
        </div>

        <div class="container-fluid">
            <div class="goal-container">
                <h3>Add Goal</h3>
                <div class="current-goal">
                    <form role="form" method="post" action="">
                        <section class="form">
                            <span> 
                                <label for="goal-title">Goal Title</label>
                                <input type="text" name="goal-title" placeholder="Goal Title here..." required="true">
                            </span>
                            <span>
                                <label for="goal-title">Goal Category</label>
                                    <input type="text" name="goal-category" placeholder="Fill In Category" required="true">
                            </span>
                            <span>
                                <label for="goal-amount">Goal Amount</label>
                                <input type="number" name="goal-amount" placeholder="Enter Goal amount..." required="true">
                            </span>
                            <span>
                                <label for="date-due">Date Due</label>
                                <input type="date" name="goal-date" required="true">
                            </span>
                        </section>
    
						    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                    </form>
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

    <script src="js/manage-goals.js"></script>

    

    	

</body>

</html>

<?php } ?>