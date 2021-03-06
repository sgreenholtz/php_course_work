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
    require_once('appvars.php');

    if (isset($_GET['id']) && isset($_GET['name']) &&
        isset($_GET['date']) && isset($_GET['score']) &&
        isset($_GET['screenshot']))
    {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $date = $_GET['date'];
        $score = $_GET['score'];

    ?>
        <p>Are you sure you want to delete this high score?</p>
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

    <?php
    }
    else if (isset($_POST['id']) && isset($_POST['name']) &&
            isset($_POST['score']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $score = $_POST['score'];
    }

    if (isset($_POST['Submit']))
    {
        if ($_POST['remove'] == "yes")
        {
            // Delete screenshot from images folder
            @unlink(GW_UPLOADPATH . $screenshot);

            // Connect to database
            $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PW, DB_NAME);

            // Query to delete the specified entry
            $query = "DELETE FROM uploads WHERE id = $id LIMIT 1";
            mysqli_query($dbc, $query);
            mysqli_close($dbc);

            echo "<p>Removed: " . $name . "<br /> Score: " . $score . "</p>";

        } // end of if remove yes
        else
        {
            echo "<p class='error'>Error deleting score.</p>";
        }
    } // end of if submitted

    else
    {
    ?>

    <form method="post" action="removescore.php"/>
        <input type="radio" name="remove" value="yes" /> Yes
        <input type="radio" name="remove" value="no" checked="checked" /> No

        <input type="hidden" name="id" value="<?= $id; ?>" />
        <input type="hidden" name="name" value="<?= $name; ?>" />
        <input type="hidden" name="score" value="<?= $score; ?>" />

        <br />
        <input type="Submit" value="Submit" name="Submit" />
    </form>

    <?php
    }
    ?>

    <p><a href="admin.php">&lt;&lt; Back to admin page</a></p>
</body>
</html>