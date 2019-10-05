<?php
	// Connect to the database
    include('includes/config.php');
	
	require_once "Mail.php"; // PEAR Mail package
    require_once ('Mail/mime.php'); // PEAR Mail_Mime packge

	if(isset($_POST['submit'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = mysqli_real_escape_string($conn, $_POST['message']);
	    
	    $query = mysqli_query($conn, "INSERT INTO contact (name, email, message) 
          VALUES('$name', '$email', '$message')");

	    if($query) {
            echo "<script>alert('Your message has been sent.');</script>";
			echo "<script>window.location.href='contact.php'</script>";
					
			
			/*======== EMAIL FUNCTION ========*/  	
		    	
		    	$from = "teamstyx@afroblogit.com"; //enter your email address
                $to = "$email"; //enter the email address of the contact your sending to
                $subject = "STYX Finance Tracker"; // subject of your email
                
                $headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);
                
                $text = ''; // text versions of email.
                $html = "<html><body>Hi $name,<br><br>Your message has been received, someone from our team will be in contact with you shortly to be of assistance. <br><br><small>Be in charge of your money</small><br><br>Love,<br>The STYX Team</body></html>"; // html versions of email.
                
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
            echo "<script>alert('Something went wrong, please try again.');</script>";
			echo "<script>window.location.href='contact.php'</script>"; 
    
        }
        
	}
	
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>STYX Finance Tracker</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
  
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 768px) {
      html,
      body,
      header,
      .view {
        height: 110%;
      }
      
      .navbar {
        background-color: #1C2331; 
      }

    }

    @media (min-width: 768px) {
      .title {
        font-size: 50px;
      }

    }
    
    .navbar {
      box-shadow: none;
    }

    .nav-link {
      font-weight: bold;
      font-size: 18px;
    }

    .nav-item {
      padding-right: 30px;
    }

  </style>
</head>

<body>
    
    <?php include('includes/navbar.php'); ?>
  
    <div class="view full-page-intro" style="background-image: url('landing.jpg'); background-repeat: no-repeat; background-size: cover;">
    
        <div class="mask rgba-blue-light d-flex justify-content-center align-items-center">
    
            <div class="content" style="max-width: 600px; margin: auto;">
            
                <div class="card py-3 px-5 mt-5">
                    <h2 class="h1-responsive text-center font-weight-bold">Contact Us</h2>
                    <p class="text-center w-responsive mx-auto d-none d-md-block">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within a matter of hours to help you.
                    </p>
                    
                    <form action="" method="post">
                    	<div class="mb-4">
                    		<label for="name" class="">Name</label>
                        	<input type="text" name="name" class="form-control" required> 
                    	</div>
                    	  
                    	<div class="mb-4">
                    		<label for="name" class="">Email Address</label>
                        	<input type="text" name="email" class="form-control" required>
                    	</div>

                    	<div class="mb-4">
                    		<label for="name" class="">Message</label>
                    		<textarea type="text" name="message" class="form-control" rows="4" required></textarea>
                    	</div>


		                <div class="text-center text-md-left">
			                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
			            </div>

		            </form>
		            
    
                </div>
    
            </div>
    
    
        </div>
    
    </div>


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>

</body>
</html>
