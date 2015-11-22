<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Risky Jobs - Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <a href="registration.php"><img src="riskyjobs_title.gif" alt="Risky Jobs" /></a>
    <img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
    <h3>Risky Jobs - Registration</h3>

<?php
    if (isset($_POST['submit']))
    {
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $job = $_POST['job'];
        $resume = $_POST['resume'];
        $output_form = 'no';

        require_once('test_empty.php');
        require_once('test_regex.php');
    }
    else
    {
        $output_form = 'yes';
    }

    if ($output_form == 'yes')
    {
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     <p>Register with Risky Jobs, and post your resume.</p>
    <table>
        <tr>
            <td><label for="firstname">First Name:</label></td>
            <td><input id="firstname" name="firstname" type="text" value="<?php echo $first_name; ?>"/></td></tr>
        <tr>
            <td><label for="lastname">Last Name:</label></td>
            <td><input id="lastname" name="lastname" type="text" value="<?php echo $last_name; ?>"/></td></tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input id="email" name="email" type="text" value="<?php echo $email; ?>"/></td></tr>
        <tr>
            <td><label for="phone">Phone:</label></td>
            <td><input id="phone" name="phone" type="text" value="<?php echo $phone; ?>"/></td></tr>
        <tr>
            <td><label for="job">Desired Job:</label></td>
            <td><input id="job" name="job" type="text" value="<?php echo $job; ?>"/></td>
    </tr>
    </table>
    <p>
        <label for="resume">Paste your resume here:</label><br />
        <textarea id="resume" name="resume" rows="4" cols="40"><?php echo $resume; ?></textarea><br />
        <input type="submit" name="submit" value="Submit" />
    </p>
</form>

<?php
    }
    else if ($output_form == 'no')
    { ?>
        <p><?= $first_name ?> <?= $last_name ?>, thanks for registering with Risky Jobs!</p>
        <p>Your phone number has been registered as: <?= $phone ?></p>
        <p>Your email has been registered as: <?= $email ?></p>

    <?php
        // code to insert data into the RiskyJobs database...
    }
?>

</body>
</html>
