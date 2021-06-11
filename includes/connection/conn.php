<?php
    //coonnection to database. 
    define("DB_SERVER", "db");
    define("DB_USER", "admin1");
    define("DB_PASS","2JOH0pqIvXqeOq5t");
    define("DB_NAME", "admin");
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    //Test if DB connection occurred
    if(mysqli_connect_errno()){
        die("Database connection failed: " . mysqli_connect_error() .
        "(" . mysqli_connect_errno() . ")" );
    }
    mysqli_query($conn, "SET NAMES 'utf'");
?>
