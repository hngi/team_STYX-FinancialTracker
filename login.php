<?php
    include('config.php');
    include('clean.php');
//Preparing the database connection
    $query = $conn -> prepare("SELECT mail, password FROM user WHERE mail = ?");
    $query -> bind_param("s", $mail);

//Collect data sent from ajax call
    $mail = clean($_POST['mail']);
    $password = clean($_POST['password']);

//Execute the prepared statement and pass the result to a variable
    $query->execute();
    $result = $query->get_result();
    $numrows = $result->num_rows;
//If user exists, check if password is also valid

    if($result->num_rows == 1){
        $row = $result ->fetch_assoc();
        if(password_verify($password,$row['password'])){
        }
        else{
            echo "Incorrect Password";
        }
    }
    else{
        echo "User not recognized";
    }
    

    $query -> close();
    mysqli_close($conn);
?>