<?php

    if (isset($_POST['signup-submit'])) {
        
        require 'dbh.inc.php';

        //Get Form Data
        $email = $_POST['email'];
        $username = $_POST['uid'];
        $password = $_POST['pwd'];
        $repeatPassword = $_POST['pwd-repeat'];

        if (empty($email) || empty($username) || empty($password) || empty($repeatPassword)) {
            header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
            exit();
        } 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?error=invaliduidormail");
            exit();
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidemail&uid=".$username);
            exit();
        }
        elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?error=invalidusername&mail".$email);
            exit();
        }
        elseif ($password !== $repeatPassword) {
            header("Location: ../signup.php?error=checkpassword&uid=".$username."&mail=".$email);
            exit();
        }
        else {
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../signup.php?error=uidtaken&mail=".$email);
                    exit();
                }
                else {
                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";;
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
                    }
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../user_homepage.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    } else {
        header("Location: ../index.php");
        exit(); 
    }
