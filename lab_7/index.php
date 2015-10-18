<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mismatch - Where opposites attract!</title>
    <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
    <h3>Mismatch - Where opposites attract!</h3>

<?php
    require_once('appvars.php');
    require_once('connectvars.php');
?>

    &#10084; <a href="viewprofile.php">View Profile</a><br />
    &#10084; <a href="editprofile.php">Edit Profile</a><br />

<?php
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT user_id, first_name, picture FROM mismatch_user WHERE " .
        "first_name IS NOT NULL ORDER BY join_date DESC LIMIT 5";
    $data = mysqli_query($dbc, $query);
?>

    <h4>Latest members:</h4>
    <table>

<?php
    while ($row = mysqli_fetch_array($data))
    {
        if (is_file(MM_UPLOADPATH . $row['picture']) && filesize(MM_UPLOADPATH . $row['picture']) > 0)
        { ?>
            <tr><td><img src="<?= MM_UPLOADPATH . $row['picture'] ?>" alt="<?= $row['first_name'] ?>" /></td>
        <?php }
        else
        { ?>
            <tr><td><img src="<?= MM_UPLOADPATH ?>nopic.jpg" alt="<?= $row['first_name'] ?>" /></td>
        <?php } ?>
       <td><?= $row['first_name'] ?></td></tr>
    <?php  }?>

    </table>

<?php
    mysqli_close($dbc);
?>

</body>
</html>
