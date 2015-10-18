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

<html>
    <head>
        <title>Mismatch - Log In</title>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
    </head>

    <body>
        <h3>Mismatch - Log In</h3>

    <?php if (empty($_COOKIE['$user_id'])) : ?>
        <p class="error"><?= $error_msg ?></p>

    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <fieldset>
            <legend>Log In</legend>

            <label for="username">Username:</label>
            <input id="username" type="text" name="username" value="<?php
                if (!empty($username)) { echo $username; } ?>" /><br />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" />
        </fieldset>
        <input type="submit" name="Submit" value="Log In" />
    </form>

    <?php else : ?>
        <p class="login">You are logged in as <?= $_COOKIE['$username']; ?></p>
    <?php endif ?>
    
</body>
</html>