<?php

    $first_name = $_POST("firstname");
    
    $last_name = $_POST("lastname");
    
    $email = $_POST("email");

    $dbc = mysqli_connect('localhost', 'sgreenholtz', '', 'c9')
        or die ('Error connecting to MySQL server.');
        
    $query = "INSERT INTO email_list (first_name, last_name, email)" .
        "VALUES ($first_name, $last_name, $email)";
        
    mysqli_query($dbc, $query)
        or die("Failed to update the database");
        
    mysqli_close($dbc);
?>