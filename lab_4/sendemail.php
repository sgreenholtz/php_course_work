<?php
    if (isset($_POST['Submit'])) 
    {
        $subject = $_POST['subject'];
        $email_body = $_POST['elvismail'];
        $from = 'sgreenholtz@madisoncollege.edu';
        $output_form = false;
    
        if (empty($subject) && empty($email_body)) 
        {
            echo "You did not enter a subject or email body!";  
            $output_form = true;
        }
        elseif (empty($subject))
        {
            echo "You did not enter a subject!";
            $output_form = true;
        }
        elseif (empty($email_body))
        {
            echo "You did not enter an email body!";
            $output_form = true;
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
            } // end of while loop
            
            mysqli_close($dbc);
        } // end of else send
    } // end of if isset submit
    else
    {
        $output_form = true;
    }
    
    if ($output_form) 
    {
?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="subject">Subject of email:</label><br />
        <input id="subject" name="subject" type="text" size="30" value="<?php echo $subject; ?>" /><br />
        
        <label for="elvismail">Body of email:</label><br />
        <textarea id="elvismail" name="elvismail" rows="8" cols="40" value="<?php echo $email_body; ?>"></textarea><br />
        
        <input type="submit" name="Submit" value="Submit" />
    </form>

<?php
    }
?>