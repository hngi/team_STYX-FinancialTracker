<?php 
    session_start();
    include('includes/config.php'); 
?>


<!DOCTYPE html>
<html>
    <head>
        <title>STYX Finance Tracker || Sign In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    
    <body>
        <div class="row">
            <div class="vec col-md-6">
                <h5 class="text-center">Be in charge of your money</h5>
                <p class="text-center">Create a new Styx finance account and take charge</p>
                <img src="images/background.png">
            </div>
       
            <div class="col-12 col-sm-12 col-md-6 main">
                
                <?php 
                    if (isset($_SESSION['success'])) {
                        echo "<div class='alert alert-success'>" .$_SESSION['success']. "</div>";
                        session_unset();
                        session_destroy();
                    } 
                    if (isset($_SESSION['invalid'])) {
                        echo "<div class='alert alert-danger'>" .$_SESSION['invalid']. "</div>";
                        session_unset();
                        session_destroy();
                    }
                ?>

                <h4 class="abs">Sign In</h4>
                
                <form method="post" action="includes/authentication.php" class="mb-5">
                    <div class="form-group mb-4">
                        <label for="email">Email address:</label> 
                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>
        
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" data-toggle="password">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <a href="forgot_password.php" class="signUpLink mt-5">Forgot Password?</a>
                    </div>

                    <div class="mt-5">
                        <input type="submit" class="button" name="login" value="Sign In">
                    </div>        
                    
                </form>

                <div class="mt-5">
                    <p class="text-center">Don't have an account? <a href="signup.php" class="signUpLink">Sign Up</a></p>
                </div>
  
            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/abdo-host/bootstrap-show-password@master/bootstrap-show-password.min.js"></script>
    </body>

</html>
