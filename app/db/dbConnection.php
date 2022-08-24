<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'Frank');
    define('DB_PASSWORD', 'emmaofmcap@7');
    define('DB_NAME', 'blog');

    // Create connection
    $conn = new MySQLI(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // Check connection
    if($conn->connect_error){
        die('Database connection error' . $conn->connect_error);
    }else{
        // echo "Connection was successful";
    }
?>