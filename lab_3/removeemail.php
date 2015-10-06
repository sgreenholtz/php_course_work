<?php

    $dbc = mysqli_connect('localhost', 'sgreenholtz', '', 'elvis_store')
        or die('Failed to connect to databse.');
    
    $email = $_POST['email'];
    
    $query = "DELETE FROM email_list WHERE email = '$email'";
    
    mysqli_query($dbc, $query)
        or die('Failed to delete email');
        
    echo 'Customer removed ' . $email;
        
    mysqli_close($dbc);

?>