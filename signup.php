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
      .register-form {
        margin-top: -50px;
      }
    
    }
    @media (min-width: 768px) {
      .title {
        font-size: 50px;
        margin-top: 150px;
      }
      .register-form {
        margin-top: 50px;
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


  <div class="view full-page-intro" style="background-image: url('landing.jpg'); background-repeat: no-repeat; background-size: cover;">

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
            <div class="card mb-5 register-form">
              <div class="card-body">
                <form name="" action="includes/authentication.php" method="post">

                  <h3 class="dark-grey-text text-center">
                    <strong>CREATE ACCOUNT</strong>
                  </h3>
                  <hr>

                  <?php
                    include("includes/authentication.php");
                    
                    if(isset($_SESSION['errors']['empty'])){
                        echo "<div class='alert alert-danger'>" .$_SESSION['errors']['empty']. "</div>";
                        unset($_SESSION['errors']['empty']);
                    }
                    
                    if(isset($_SESSION['errors']['password'])){
                        echo "<div class='alert alert-danger'>" .$_SESSION['errors']['password']. "</div>";
                        unset($_SESSION['errors']['password']);
                    }
                    
                    if(isset($_SESSION['errors']['number'])){
                        echo "<div class='alert alert-danger'>" .$_SESSION['errors']['number']. "</div>";
                        unset($_SESSION['errors']['number']);
                    }
                    
                    if(isset($_SESSION['errors']['email'])){
                        echo "<div class='alert alert-danger'>" .$_SESSION['errors']['email']. "</div>";
                        unset($_SESSION['errors']['email']);
                    }
                    
                    if(isset($_SESSION['errors']['fname'])){
                        echo "<div class='alert alert-danger'>" .$_SESSION['errors']['fname']. "</div>";
                        unset($_SESSION['errors']['fname']);
                    }
                  ?>

                  <div class="md-form">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" name="fname" class="form-control">
                    <label for="form2">Full Name</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="text" name="email" class="form-control">
                    <label for="form2">Email</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-phone prefix grey-text"></i>
                    <input type="text" name="phone" class="form-control">
                    <label for="form2">Phone Number</label>
                  </div>
                  
                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="pword" class="form-control">
                    <label for="form2">Password</label>
                  </div>

                  <div class="md-form">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input type="password" name="cpword" class="form-control">
                    <label for="form2">Confirm Password</label>
                  </div>
                  
                  <div class="text-center">
                    <button class="btn btn-indigo" type="submit" name="register">SIGN UP</button>
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