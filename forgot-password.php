<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];

        $query=mysqli_query($conn,"SELECT idUsers FROM users WHERE  emailUsers='$email' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Reset Password</title>
    <link rel="stylesheet" href="forgotpassword.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    
    <!-- <link rel="stylesheet" href="./plugins/bootstrap/css/bootstrap.min.css" type="text/css"> -->
  </head>
  <body>
<section>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="user_homepage.html">Home</a>
                <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="my-nav" class="collapse navbar-collapse">   <!-- -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Sign in <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <span> Don't have an account?</span> <a class="nav-link Sign" href="signup.php" tabindex="-1" aria-disabled="true">Sign up</a>
                        </li>
                    </ul>
                </div>
        </nav>
    </div>
</section>

<section>
    <div class="container">
        <div class="main">
            <div class="text">
                <img src="https://res.cloudinary.com/phiileo/image/upload/v1569440686/download_1_jrx8du.png" alt="" width="15%"> <br> <br>
                <h2>Forgot Your Password?</h2>
                <p>Enter your email address below and we'll get you back on track</p>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email"><br>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button><br><br>
                    <span>
                        <a href="index.php">Back to Sign in</a>
                    </span>
                </form>
            </div>
        </div>
    </div>
</section>

    <!-- Bootstarp JS -->
    <script src="./plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>