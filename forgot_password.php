<?php 
  ob_start();
  include('includes/config.php'); 
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

    .mt-5{
      font-size: 13px
    }

    @media (max-width: 768px) {
      html,
      body,
      header,
      .view {
        height: 100%;
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
                <form name="" action="includes/authentication.php" method="post">

                  <h3 class="dark-grey-text text-center">
                    <strong>FORGOT PASSWORD</strong>
                  </h3>
                  <hr>

                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" name="email" class="form-control" required>
                    <label for="form2">Email</label>
                  </div>
                  
                  <div class="text-center">
                    <button class="btn btn-indigo" type="submit" name="forgot">SUBMIT</button>
                  </div>

                  <div class="mt-5">
                  
                    <p class="text-center">I know my password now <a href="index.php" class="signUpLink">Sign In</a> || Don't have an account? <a href="signup.php" class="signUpLink">Sign Up</a></p>
                  
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
