<?php

    session_start();
    
    $uemail = $_GET['useremail'];
    $timedate = $_GET['log'];
    $decodetimedate = base64_decode($timedate);
    
    date_default_timezone_set('Africa/Lagos');
	$checktime = date('H:i');
	
	$hour1 = preg_replace("/[^0-9]/", "", $decodetimedate);
    $hour2 = preg_replace("/[^0-9]/", "", $checktime);

    
    $diff = $hour2 - $hour1;
    // var_dump($diff);
    
    if ($diff > 10) {
        header('location:forgot_password.php');
    }
    
    
    if (empty($uemail) && empty($timedate)) {
        header('location:forgot_password.php');
    } else {
    
        ob_start();
        include('includes/config.php');
      
        /*====== Authentication to reset password ======*/
    	if(isset($_POST['reset'])) {
            
    		$uemail = $_GET['useremail'];
    		
    		$npword = $_POST['npword'];
    		$cpword = $_POST['cpword'];
    		$hash = md5($npword);
    		
    		if ($npword !== $cpword) {
    			echo "<script>alert('Passwords do not match');
    			window.history.back();</script>";
    		} else {   
    		    
    		    $query = mysqli_query($conn, "UPDATE users SET pword = '$hash' WHERE email = '$uemail' ");
    		    
    		    if($query) {
    		        $msg = "Password has been reset, proceed to login";
    		    } else {
    		        $error = "Something went wrong, please try again";
    		    }
    		    
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
        height: 100%;
      }

    }

    @media (min-width: 768px) {
      .title {
        font-size: 50px;
      }

    }

  </style>
</head>

<body>

  <div class="view full-page-intro" style="background-image: url('landing.jpg'); background-repeat: no-repeat; background-size: cover;">

    <div class="mask rgba-blue-light d-flex justify-content-center align-items-center">

      <div class="container">
        <div class="row wow fadeIn">
          <div class="col-md-7 mb-4 white-text text-center text-md-left">

            <h1 class="title font-weight-bold d-none d-md-block">STYX Finance Tracker</h1>

            <hr class="hr-light d-none d-md-block">

            <p class="h5 d-none d-md-block">
              <strong>Be in charge of your money</strong>
            </p>
            <p class="mb-4 h5 d-none d-md-block">
              <strong>Create a new Styx account and take charge</strong>
            </p>

          </div>

          <div class="col-md-6 col-xl-5">
            <div class="card mb-5 login-form">
              <div class="card-body">
                <form name="" action="" method="post">

                  <h3 class="dark-grey-text text-center">
                    <strong>RESET PASSWORD</strong>
                  </h3>
                  <hr>
                  
                    <!---Success Message--->
                    <?php if($msg){ ?>
                    <div class="alert alert-success" role="alert">
                    <strong>Well done!</strong> <?php echo htmlentities($msg);?>
                    </div>
                    <?php } ?>
                    
                    <!---Error Message--->
                    <?php if($error){ ?>
                    <div class="alert alert-danger" role="alert">
                    <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
                    <?php } ?>

                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="npword" class="form-control" required>
                    <label for="form2">Password</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="cpword" class="form-control" required>
                    <label for="form2">Confirm Password</label>
                  </div>
                  
                  <div class="text-center">
                    <button class="btn btn-indigo" type="submit" name="reset">RESET</button>
                    <hr>
                    <p>Already have an account? <a href="index.php">Sign In</a></p>
                  </div>

                </form>

              </div>

            </div>

          </div>

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

<?php } ?>