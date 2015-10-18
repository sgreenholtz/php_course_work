<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mismatch - Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
  <h3>Mismatch - Sign Up</h3>

<?php
    require_once('appvars.php');
    require_once('connectvars.php');

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (isset($_POST['Submit']))
    {
        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));


        if (!empty($username) && !empty($password1) && !empty($password2) &&
            $password1 == $password2)
        {
            $unique_user_query = "SELECT * FROM mismatch_user WHERE username = " .
                "'$username'";
            $unique_user_result = mysqli_query($dbc, $unique_user_query);

            if (mysqli_num_rows($unique_user_result) == 0)
            {
                $todays_date = date(Y-m-d);
                $insert_user_query = "INSERT INTO mismatch_user " .
                    "(username, password, join_date) VALUES ".
                    "('$username', SHA('$password1'), NOW())";

                mysqli_query($dbc, $query);
            ?>

                <p>Your new account has been successfully created. You\'re now
                ready to log  in and <a href="editprofile.php">edit your
                profile</a>.</p>

            <?php
                mysqli_close($dbc);
                exit();
            }
            else
            { ?>
                <p class="error">An account already exists for this username.
                Please choose something else.</p>

            <?php
                $username = "";
            }
        }
        else
        { ?>
            <p class="error">You must enter all of the sign-up information.</p>
        <?php }
    }
    mysqli_close($dbc);
?>

    <p>Please enter a username and password to sign up for Mismatch.</p>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Registration Info</legend>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username"
                value="<?php if (!empty($username)) { echo $username; } ?>"/><br />

            <label for="password1">Password:</label>
            <input type="password" id="password1" name="password1" /><br />

            <label for="password2">Password (retype):</label>
            <input type="password" id="password2" name="password2" /><br />

        </fieldset>
    <input type="submit" name="submit" value="Submit" />
    </form>

</body>
</html>