<?php
    require_once('connectvars.php');

    session_start();
    $error_msg = "";

    if (!isset($_COOKIE['user_id']))
    {
        if (!isset($_POST['Log In']))
        {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

            if (!empty($username) && !empty($password))
            {
                $user_query = "SELECT username" .
                              "FROM authenticate " .
                              "WHERE username = '$username' " .
                              "AND password = SHA('$password')";
                $data = mysqli_query($dbc, $user_query);

                if (mysqli_num_rows($data) == 1)
                {
                    $row = mysqli_fetch_array($data);
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    setcookie('user_id', $row['user_id'], time() + (60 * 60 * 8));
                    setcookie('username', $row['username'], time() + (60 * 60 * 8));
                    $admin_url = 'https://' . $_SERVER['HTTP_HOST'] .
                        dirname($_SERVER['PHP_SELF']) . '/admin.php';
                    header('Location: ' . $admin_url);
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

    require_once('header.php');

    if (empty($_SESSION['user_id'])) : ?>
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
    <?php endif;

    require_once('footer.php');
?>