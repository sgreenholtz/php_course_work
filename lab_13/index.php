<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Aliens Abducted Me</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <h2>Aliens Abducted Me</h2>
    <p>Welcome, have you had an encounter with extraterrestrials?
    Were you abducted? Have you seen my abducted dog, Fang?
    <a href="report.php">Report it here!</a></p>

<?php
    require_once('connectvars.php');


    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (isset($_GET['abduction_id']))
    {
        $query = "SELECT * FROM aliens_abduction WHERE abduction_id = " . $_GET['abduction_id'] . "'";
    }
    else
    {
        $query = "SELECT * FROM aliens_abduction ORDER BY when_it_happened DESC LIMIT 5";
    }

    $data = mysqli_query($dbc, $query);

    if (mysqli_num_rows($data) == 1)
    {
        $row = mysqli_fetch_array($data);
    ?>
        <p><strong>Name: </strong><?= $row['first_name'] ?> <?= $row[last_name] ?><br />
        <strong>Date:</strong> <?= $row['when_it_happened'] ?><br />
        <strong>Email:</strong> <?= $row['email'] ?><br />
        <strong>Abducted for:</strong> <?= $row['how_long'] ?><br />
        <strong>Number of aliens:</strong> <?= $row['how_many'] ?><br />
        <strong>Alien description:</strong> <?= $row['alien_description'] ?><br />
        <strong>What happened:</strong> <?= $row['what_they_did'] ?><br />
        <strong>Other:</strong> <?= $row['other'] ?><br />
        <strong>Fang spotted:</strong> <?= $row['fang_spotted'] ?></p>
        <p><a href="index.php">&lt;&lt; Back to the home page</a></p>

    <?php
    }
    else
    {
    ?>
        <h4>Most recent reported abductions:</h4>

        <table width="100%">
    <?php
    while ($row = mysqli_fetch_array($data))
    {
    ?>
        <tr class="heading"><td colspan="3"><a href="index.php?abduction_id=<?= $row['abduction_id'] ?>"><?= $row['when_it_happened'] ?> : <?= $row['first_name'] ?> <?= $row[last_name] ?></a></td></tr>
        <tr><td><strong>Abducted for:</strong><br /> <?= $row['how_long'] ?>
        <td><strong>Alien description:</strong><br /> <?= $row['alien_description'] ?>
        <td><strong>Fang spotted:</strong><br /> <?= $row['fang_spotted'] ?></td></tr>
    <?php
    }
    ?>
    </table>

    <p><a href="newsfeed.php"><img style="vertical-align:top; border:none" src="rssicon.png" alt="Syndicate alien abductions" /> Click to syndicate the abduction news feed.</a></p>

    <h4>Most recent abduction videos:</h4>
<?php
    require_once('youtube.php');

    }

    mysqli_close($dbc);
?>

</body>
</html>