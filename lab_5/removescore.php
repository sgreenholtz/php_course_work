<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <h2>Guitar Wars - Remove a High Score</h2>

    <?php
    require_once('connectvars.php');

    $name = $_GET['name'];
    $date = $_GET['date'];
    $score = $_GET['score'];

    echo 'Are you sure you want to delete this high score?'

    ?>
    <table>
        <tr>
            <td><strong>Name: </strong></td>
            <td><?= $name ?></td>
        </tr>
        <tr>
            <td><strong>Date: </strong></td>
            <td><?= $date ?></td>
        </tr>
        <tr>
            <td><strong>Score: </strong></td>
            <td><?= $score ?></td>
        </tr>
    </table>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"/>
        <label for="remove">Remove?</label>
        <input type="radio" id="remove">

        <input type="Submit" value="Submit" />
    </form>

</body>
</html>