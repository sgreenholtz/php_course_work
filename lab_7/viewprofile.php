<?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        if (isset($_COOKIE['user_id']) && isset($_COOKIE['username']))
        {
            $_SESSION['user_id'] = $_COOKIE['user_id'];
            $_SESSION['username'] = $_COOKIE['username'];
        }
    }

    require_once('appvars.php');
    require_once('connectvars.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mismatch - View Profile</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
    <h3>Mismatch - View Profile</h3>

    <?php if (!isset($_SESSION['user_id']))
    { ?>
        <p class="login">Please <a href="login.php">log in</a> to access this page.</p>
    <?php exit();
    }
    else
    { ?>
        <p class="login">You are logged in as <?= $_SESSION['username'] ?>.
            <a href="logout.php">Log out</a>.</p>
    <?php }

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!isset($_GET['user_id']))
    {
        $query = "SELECT username, first_name, last_name, gender, birthdate, city, " .
            "state, picture FROM mismatch_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
    }
    else
    {
        $query = "SELECT username, first_name, last_name, gender, birthdate, city, " .
        "state, picture FROM mismatch_user WHERE user_id = '" . $_GET['user_id'] . "'";
    }

    $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1)
    {
        $row = mysqli_fetch_array($data);
    ?>
        <table>
        <?php if (!empty($row['username']))
        { ?>
            <tr><td class="label">Username:</td><td><?= $row['username'] ?></td></tr>
        <?php }
        if (!empty($row['first_name']))
        { ?>
            <tr><td class="label">First Name:</td><td><?= $row['first_name'] ?></td></tr>
        <?php }
        if (!empty($row['last_name']))
        { ?>
            <tr><td class="label">Last Name:</td><td><?= $row['last_name'] ?></td></tr>
        <?php }
        if (!empty($row['gender']))
        { ?>
            <tr><td class="label">Gender:</td><td>
        <?php }
            if ($row['gender'] == 'M')
            { ?>
                Male
            <?php }
            elseif ($row['gender'] == 'F')
            { ?>
                Female
            <?php }
            else
            { ?>
                ?
        <?php } ?>
        </td></tr>
        <?php if (!empty($row['birthdate']))
        { ?>
            <?php if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id']))
            { ?>
                <tr><td class="label">Birthdate:</td><td><?= $row['birthdate'] ?></td></tr>
            <?php }
            else
            {
                list($year, $month, $day) = explode('-', $row['birthdate']); ?>
                <tr><td class="label">Year born:</td><td><?= $year ?></td></tr>
            <?php }
        }
        if (!empty($row['city']) || !empty($row['state']))
        { ?>
            <tr><td class="label">Location:</td><td><?= $row['city'] ?>, <?= $row['state'] ?></td></tr>
        <?php }
        if (!empty($row['picture']))
        { ?>
        <tr><td class="label">Picture:</td><td><img src="<?= MM_UPLOADPATH . $row['picture'] ?>"
    </table>
            alt="Profile Picture" /></td></tr>
        <?php }
        if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id']))
        { ?>
            <p>Would you like to <a href="editprofile.php">edit your profile</a>?</p>
        <?php }
    }
    else
    { ?>
        <p class="error">There was a problem accessing your profile. 123</p>
    <?php }
    mysqli_close($dbc);
    ?>

</body>
</html>