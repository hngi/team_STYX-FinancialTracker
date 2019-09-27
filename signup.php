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
<?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo '<p class="signuperror">Fill In All Fields!</p>';
        }
        elseif ($_GET['error'] == "invalidusername") {
            echo '<p class="signuperror">Fill in a valid Username</p>';
        }
        elseif ($_GET['error'] == "invalidemail") {
            echo '<p class="signuperror">Fill in a valid email</p>';
        }
        elseif ($_GET['error'] == "checkpassword") {
            echo '<p class="signuperror">Passwords do not match</p>';
        }
        elseif ($_GET['error'] == "uidtaken") {
            echo '<p class="signuperror">Username Taken</p>';
        }
    }
    else {
        echo '<p class="signupsuccess">Signup Success!</p>';
    }
?>
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
           <br>
           <br>
           <form action="includes/signup.inc.php" method="post">
                    
                    <div class="inputbox">
                    <input type="text" name="uid" required>
                    <label>Fullname</label>
                    <span></span>
                    </div>
                    <div class="inputbox">
                    <input type="email" name="email" required>
                    <label>Email</label>
                    <span></span> 
                    </div>
                    <div class="inputbox">
                    <input type="password" name="pwd" required>
                    <label>Password</label>
                    <span></span> 
                    </div>
                    <div class="inputbox">
                    <input type="password" name="pwd-repeat" required>
                    <label>Password</label>
                    <span></span> 
                    </div>
                    <input type="submit" name="signup-submit" value="SignUp">
                    <h6 id="link" style="text-align: center">Already have an account?&nbsp;&nbsp;<a href="index.php">login</a></h6>
                </form>
        </div>
    </div>
    <script src="particles.js"></script>
    <script src="app.js"></script>
</body>
</html>