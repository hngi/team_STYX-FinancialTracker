<?php

$DB_HOST = 'localhost:3307';
    $DB_USER = 'root';
    $DB_PWD = '2730';
    $DB_NAME = 'cshlogindb';



    //Create Connection
     $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PWD, $DB_NAME);

    //Check Connection
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }