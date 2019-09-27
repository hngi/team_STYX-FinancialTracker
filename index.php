<?php

   session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Finance Calculator</title>
    <link rel="stylesheet" href="main.css">
    <script type="text/javascript" src="script.js"></script>   
</head>
<body id="particles-js">
   <div class="container">
      <div class="msg_field">
         <br><br>
         <br><br>
         <br><br>           
         <br><br>           
         <a href="" class="typewrite" data-period="2000" data-type='[ "Hi, User,", "Welcome to", "Styx Team", "Financial Calculator." ]'>
         <span class="wrap"></span>
         </a>
      </div>

         <div class="box">
            <?php 
                if (isset($_SESSION['userId'])) {
                    echo  '<form action="includes/logout.inc.php" method="POST">
                    <input type="submit" name="logout-submit" value="Log Out">
                         <h6 id="link" style="text-align: center">Dont have an account?&nbsp;&nbsp;<a href="signup.php">Sign up</a></h6>
                    </form>';
                }
                else {
                    echo ' 
                    <form action="includes/login.inc.php" method="POST">
                    <div class="inputbox">
                       <input type="text" name="emailuid" required>
                       <label>Email</label>
                       <span></span> 
                    </div>
                    <div class="inputbox">
                       <input type="password" name="pwd" required>
                       <label>Password</label>
                       <span></span> 
                    </div>
                    <input type="submit" name="login-submit" value="Log In">
                    <h6 id="link" style="text-align: center">Dont have an account?&nbsp;&nbsp;<a href="signup.php">Sign up</a></h6>
                    <h6 id="link" style="text-align: center">Forgotten Password?&nbsp;&nbsp;<a href="forgot-password.php">Retrieve</a></h6>
                </form>';
                }
             ?>              
        </div>
   </div>
   <script src="particles.js"></script>
   <script src="app.js"></script>

</body>
</html>