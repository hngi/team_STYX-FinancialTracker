<?php

	if(isset($_POST['submitcontact'])){

		$name = $_POST['name'];
		$email= $_POST['email'];
		$message=$_POST['msg'];
   		 if (!preg_match("/^[a-zA-Z]*$/", $name) || strlen($name) > 25){
			header("Location: contact.php?signup=char");
			exit();
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: contact.php?signup=email");
				exit();
		}else {
		$email_from ='teamstynxcontact@gmail.com';
		$email_subject = 'New Contact Form Submission';
		$email_body = "Username: $name. \n".
					"User Email: $email. \n". 
					"User Message: $message. \n";

		$to = "teamstynxfeedback@gmail.com";

		$headers = "From: $email_from \r\n";
		$headers .= "Reply-To: $email \r\n";
		
		mail($to, $email_subject,$email_body,$headers);
				header("Location: contact.php?signup=success");
				exit();
				}
			
	}	


?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STYX Finance Tracker || Contact Us</title>
	<!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<link href="bootstrap.css" rel="stylesheet">
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

    #container {
      width: 70%;
      margin-left: 15%;
    }
		#row {
			margin-top: 2%;
		}
		.head {
			color: white;
		}
		#head {
			margin-left: 8%;
		}
		#error_message {
			background-color: red;
			color: white;
			font-size: 20px;
		}
		#success_message {
			background-color: green;
			color: white;
			font-size: 20px;
		}
	</style>
</head>

<body style="padding-top:0px">
		<div class="row" style="background-color: #071739">
			<div class="col-lg-12 col-md-12 col-sm-12 c0l-xs-12">
				<div class="head" id="head">
					<h3 class="head"><a href="dashboard.php">STYX Finance Tracker</a></h3>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row" id="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading text-center">Contact Us</div>
						<div class="panel-body">
							<div class="col-md-12">
                <div id="container">
								<form role="form" method="post" action="">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" id="name" class="form-control" value="" required placeholder="Enter FullName" autocomplete="off">
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="email" name="email" id="email" class="form-control" value="" required="true" placeholder="example@gmail.com">
									</div>

									<div class="form-group">
										<label>Message</label>
										<textarea name="msg" rows="8" cols="80" id="message" class="form-control" required="true" placeholder="Enter Your Thoughts Here"></textarea>
									</div>

									<div class="form-group has-success">
										<button type="submit" class="btn btn-primary btn-block" id="submitcontact"name="submitcontact">Submit</button>
										
			<?php
					
					 $fullUrl ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

					 if(strpos($fullUrl, "?signup=char" ) == true ){
						 echo "<span id='error_message'> Invalid name </span>";
					
					 } elseif(strpos($fullUrl, "?signup=email" ) == true ){
						 echo "<span id='error_message'> Invalid email </span>";
					
					 } elseif(strpos($fullUrl, "?signup=success" ) == true ){
						 echo "<span id='success_message'> Thanks!!, Your message has been sent </span>";
					
					 } 

			?>
									</div>
									<br>
                  </form>
					
						
								</div>

							</div>
						</div>
					</div>
				</div>
				<p style="text-align: center">FINANCIAL TRACKER <a href="dashboard.php">STYX</a></p>
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



