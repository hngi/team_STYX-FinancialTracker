<?php
//Database details
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "Finance_Tracker";

    //Database Connection
    $conn = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
    if ($conn === false) {
        die("ERROR: Could not cconnect to the databse at this time. ".mysqli_connect_error());
    }
?>