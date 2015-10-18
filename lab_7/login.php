<?php
  require_once('connectvars.php');

    $error_msg = "";

    if (!isset($_COOKIE['user_id']))
    {
        if (!isset($_POST['Submit']))
        {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

            if (!empty($username) && !empty($password))
            {
                $user_query = "SELECT user_id, username FROM mismatch_user" .
                    "WHERE username = '$username' AND password = SHA('$password')";
                $data = $data = mysqli_query($dbc, $query);

                if (mysqli_num_rows($data) == 1)
                {
                    $row = mysqli_fetch_array($data);
                    setcookie('user_id', $row['user_id']);
                    setcookie('username', $row['username']);
                    $home_url = 'https://' . $_SERVER['HTTP_HOST'] .
                        dirname($_SERVER['PHP_SELF']) . '/index.php';
                    header('Location: ' . $home_url);
                }
                else
                {
                    $error_msg = "Sorry, you must enter a valid username and " .
                        "password to log in.";
                }
            }
            else
            {
                $error_msg = "Please enter both username and password";
            }
        }
    }
?>
