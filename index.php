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
    @media (max-width: 768px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
      .navbar {
        background-color: #1C2331; 
      }
      .title {
        font-size: 40px;
        margin-top: 50px;
      }
      .login-form {
        margin-top: -e50px;
      }
    
    }
    @media (min-width: 768px) {
      .title {
        font-size: 50px;
        margin-top: 100px;
      }
    }
    .top-nav-collapse {
      background-color: #1C2331; 
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


  <div class="view full-page-intro" style="background-image: url('https://res.cloudinary.com/phiileo/image/upload/v1570269444/landing_kav9zp.jpg'); background-repeat: no-repeat; background-size: cover;">

    <div class="mask rgba-blue-light d-flex justify-content-center align-items-center">

      <div class="container">
        <div class="row wow fadeIn">
          <div class="col-md-7 mb-4 white-text text-center text-md-left">

            <h1 class="title font-weight-bold">STYX Finance Tracker</h1>

            <hr class="hr-light">

            <p class="h5 d-none d-md-block">
              <strong>Be in charge of your money</strong>
            </p>
            <p class="mb-4 h5 d-none d-md-block">
              <strong>Create a new Styx account and take charge</strong>
            </p>

          </div>

          <div class="col-md-6 col-xl-5 mb-4 mt-5">
            <div class="card mb-5 login-form">
              <div class="card-body">
                <form name="" action="includes/authentication.php" method="post">

                  <h3 class="dark-grey-text text-center">
                    <strong>LOGIN</strong>
                  </h3>
                  <hr>

                  <?php 
                    if (isset($_SESSION['success'])) {
                        echo "<div class='alert alert-success'>" .$_SESSION['success']. "</div>";
                        session_unset();
                    } 
                    
                    if (isset($_SESSION['invalid'])) {
                        echo "<div class='alert alert-danger'>" .$_SESSION['invalid']. "</div>";
                        session_unset();
                    }
                  ?>

                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="text" name="email" class="form-control">
                    <label for="form2">Email</label>
                  </div>
                  
                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="password" class="form-control">
                    <label for="form2">Password</label>
                  </div>
                  
                  <div class="text-center">
                    <a href="forgot_password.php">Forgot Password</a></p>
                    <button class="btn btn-indigo" type="submit" name="login">SIGN IN</button>
                    <hr>
                    <p class="mt-5">Don't have an Account? <a href="signup.php">Sign Up</a></p>
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