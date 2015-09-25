<?php
    $dbc = mysqli_connect('localhost', 'sgreenholtz', '', 'elvis_store')
        or die('Failed to connect to databse.');

    if (isset($_POST['Remove']))
    {
        foreach ($_POST['todelete'] as $delete_id)
        {
            $delete_query = "DELETE FROM email_list WHERE id = $delete_id";
            mysqli_query($dbc, $delete_query)
                or die('Error querying database.');
            echo 'Successfully removed email from list.';
        }
    }
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

<?php
    
    $email = $_POST['email'];
    
    // Display rows of customer emails with checkbox for deleting
    $query = "SELECT * FROM email_list";
    $result = mysqli_query($dbc, $query);
        
    while ($row = mysqli_fetch_array($result))
    {
        echo '<input type="checkbox" value="' . $row['id'] . '" name ="todelete[]" />';     
    
        echo $row['first_name'];
        
        echo ' ' . $row['last_name'];
        
        echo ' ' . $row['email'];
        
        echo '<br />';
    }        
    
    mysqli_close($dbc);
?>

    <input type="submit" name="Remove" value="Remove" />
</form>