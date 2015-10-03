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

    if (isset($_GET['id']) && isset($_GET['name']) &&
        isset($_GET['date']) && isset($score = $_GET['score']))
    {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $date = $_GET['date'];
        $score = $_GET['score'];
    }
    else if (isset($_POST['id']) && isset($_POST['name']) &&
            isset($_POST['date']) && isset($score = $_POST['score']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $score = $_POST['score'];
    }
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
        <input type="radio" name="remove" value="yes" /> Yes
        <input type="radio" name="remove" value="no" checked /> No
        <br />
        <input type="Submit" value="Submit" />
    </form>

    <?php
        if (isset($_POST['Submit']))
        {
            echo 'Successful submit';
            /* if ($_POST['remove'] == 'yes')
            {
                $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PW, DB_NAME);
                $query = "DELETE FROM uploads WHERE id = '$id'";

                if (mysqli_query($dbc, $query))
                {
                    echo 'Successfully deleted';
                }
                else
                {
                    echo 'Error attempting to delete';
                }
            } end of if remove yes */
        } // end of if submitted

    ?>

</body>
</html>