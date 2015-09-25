<?php
    
    $subject = $_POST['subject'];
    
    $email_body = $_POST['elvismail'];
    
    $from = 'sgreenholtz@madisoncollege.edu';
    
    if ((empty($subject)) && (empty($email_body))) 
    {
        echo "You did not enter a subject or email body!";   
    }
    elseif (empty($subject))
    {
        echo "You did not enter a subject!";
    }
    elseif (empty($email_body))
    {
        echo "You did not enter an email body!";
    }
    else
    {
        $dbc = mysqli_connect('localhost', 'sgreenholtz', '', 'elvis_store')
            or die('Failed to connect to database.');
    
        $query = "SELECT * FROM email_list";
    
        $result = mysqli_query($dbc, $query);
        
        while ($row = mysqli_fetch_array($result)) 
        {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
        
            $msg = "Dear $first_name $last_name, \n$email_body";
        
            mail($email, $subject, $msg, 'From:' . $from);
        
            echo 'Email sent to: ' . $first_name . ' ' . $last_name . '<br />';
        }
        
        mysqli_close($dbc);
    }
    
?>