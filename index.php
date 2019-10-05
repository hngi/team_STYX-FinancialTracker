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
     .btn-indigo {
         color: #fff;
         background: #3F51B5!important;
         overflow: hidden!important;
         border-radius: 0px!important;
         transition: 0.2s!important;
    }
      .btn-indigo:hover {
/*          color: aq;*/
          background: #2196f3!important;
         box-shadow: 0 0 5px #2196f3, 0 0 20px #2196f3, 0 0 40px #2196f3!important;
         border-radius: 0px!important;
          transition-delay: .1s!important;
    }
      .btn-indigo span {
          position: absolute;
/*          display: block;*/
      }
       .btn-indigo span:nth-child(1) {
          top: 0;
          left: -100%;
          width: 100%;
          height: 2px;
          background: linear-gradient(90deg, transparent, #fff);
      }
      .btn-indigo:hover span:nth-child(1) {
          left: 100%;
          transition: 1s;
      }
      
      .btn-indigo span:nth-child(3) {
          bottom: 0;
          right: -100%;
          width: 100%;
          height: 2px;
          background: linear-gradient(270deg, transparent, #fff);
      }
      .btn-indigo:hover span:nth-child(3) {
          right: 100%;
          transition: 1s;
          transition-delay: 0.5s;
      }
      
      .btn-indigo span:nth-child(2) {
          top: -100%;
          right: 0;
          width: 2px;
          height: 100%;
          background: linear-gradient(180deg, transparent, #fff);
      }
      .btn-indigo:hover span:nth-child(2) {
          top: 100%;
          transition: 1s;
          transition-delay: 0.25s;
      }
      
      .btn-indigo span:nth-child(4) {
          bottom: -100%;
          left: 0;
          width: 2px;
          height: 100%;
          background: linear-gradient(360deg, transparent, #fff);
      }
      .btn-indigo:hover span:nth-child(4) {
          bottom: 100%;
          transition: 1s;
          transition-delay: 0.75s;
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
                    <p><center><a href="forgot_password.php">Forgot Password</a></center></p>
                    <button class="btn btn-indigo" type="submit" name="login">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    SIGN IN</button>
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
