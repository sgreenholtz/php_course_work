<html>
    <head>
        <title>Aliens Abducted Me - Report an Abduction</title>
    </head>
    
    <body>
        <h2>Aliens Abducted Me - Report an Abduction</h2>
    
    <?php 
    
        $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
        
        $when_it_happened = $_POST['whenithappened'];
        
        $how_long = $_POST['howlong'];
        
        $how_many = $_POST['howmany'];
        
        $alien_description = $_POST['aliendescription'];
        
        $what_they_did = $_POST['whattheydid'];
    
        $fang_spotted = $_POST['fangspotted'];
        
        $other = $_POST['other'];
        
        $email = $_POST['email'];
        
        $msg = "$name was adbudcted $when_it_happened and was gone for $how_long.\n" .
            "Number of aliens: $how_many\n" .
            "Alien description: $alien_description\n" .
            "What they did: $what_they_did\n" .
            "Fang spotted: $fang_spotted\n" .
            "Other comments: $other";
            
        $to = 'owen@aliensabductedme.com';
        
        $subject = 'Aliens Abducted Me - Abduction Report';
    
        $dbc = mysqli_connect('localhost', 'sgreenholtz', '', 'c9')
            or die ('Error connecting to MySQL server.');
        
        $query = "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened, how_long," .
            "how_many, alien_description, what_they_did, fang_spotted, other, email)" .
            "VALUES ('Sally', 'Jones', '3 days ago', '1 day', 'four', 'green with six tentacles'," .
            "'We just talked and played with a dog', 'yes', 'I may have seen your dog. Contact me.'," .
            "'sally@gregs-list.net');";
        
        $result = mysqli_query($dbc, $query)
            or die('Error querying database.');
        
        mysqli_close($dbc);
        
        echo 'Thanks for submitting the form.<br />';
        
        echo 'You were abducted ' . $when_it_happened;
        
        echo ' and were gone for ' . $how_long . '<br />';
        
        echo 'Number of Aliens: ' . $how_many . 'br />';
        
        echo 'Describe them: ' . $alien_description . 'br />';
        
        echo 'Was Fang there? ' . $fang_spotted . '<br />';
        
        echo 'Other comments: ' . $other . '<br />';
        
        echo 'Your email address is ' . $email;
    
    ?>
    
    </body>
</html>