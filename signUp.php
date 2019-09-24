<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div class="row">
            <!--image-->
            <div class="vec col-md-6">
                <img src="https://res.cloudinary.com/friilancer/image/upload/v1569282271/srpvmlhnoilfvpdadtt1.png">
            </div>
            <!--form-->
            <div class="col-12 col-sm-12 col-md-6 main">
              <form method="post" action="register.php">
                <div class="form-group mb-4">
                    <?php
                        include("register.php");
                        if(isset($_SESSION['errors']['empty'])){
                            echo "<div style='color: red; padding: 5px;'>" .$_SESSION['errors']['empty']. "</div>";
                            unset($_SESSION['errors']['empty']);
                        }
                        if(isset($_SESSION['errors']['password'])){
                            echo "<div style='color: red; padding: 5px;'>" .$_SESSION['errors']['password']. "</div>";
                            unset($_SESSION['errors']['password']);
                        }
                        if(isset($_SESSION['errors']['number'])){
                            echo "<div style='color: red; padding: 5px;'>" .$_SESSION['errors']['number']. "</div>";
                            unset($_SESSION['errors']['number']);
                        }
                        if(isset($_SESSION['errors']['email'])){
                            echo "<div style='color: red; padding: 5px;'>" .$_SESSION['errors']['email']. "</div>";
                            unset($_SESSION['errors']['email']);
                        }
                        if(isset($_SESSION['errors']['pass_leng'])){
                            echo "<div style='color: red; padding: 5px;'>" .$_SESSION['errors']['pass_leng']. "</div>";
                            unset($_SESSION['errors']['pass_leng']);
                        }
                    ?>
                    <label for="name">Full Name:</label> 
                    <input type="text" class="form-control" name="fname">
                </div>
                <div class="form-group mb-4">
                    <label for="email">Email address:</label> 
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group mb-4">
                    <label for="number">Phone Number:</label> 
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="pword">
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password:</label>
                    <input type="password" class="form-control" name="cpword">
                </div>
                <br>
                <!--sign up button-->
                <input type="submit" class="button" name="submit" value="Sign Up" />
            </form>
            <br>    
            <!-- sign in link-->
            <p class="text-center">Already have an account? <a href="login.html" class="signUpLink">Sign In</a></p>
           </div>
        </div> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>