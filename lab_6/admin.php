<?php require_once('authorize.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <h2>Guitar Wars - Remove Unverified Scores</h2>

<?php
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PW, DB_NAME)
    or die('Error connecting to the database');

$select_query = "SELECT * FROM uploads";
$select_result = mysqli_query($dbc, $select_query);


echo '<table>';

while ($row = mysqli_fetch_array($select_result))
{
    echo '<tr>';
    echo '<td><strong>' . $row['name'] . '</strong><td>';
    echo '<td>'. $row['score'] . '</td>';
    echo '<td>&nbsp;&nbsp;&nbsp;</td>'; // whitespace for reading clarity
    echo '<td>' . $row['date'] . '</td>';
    echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;date=' .
        $row['date'] . '&amp;name=' . $row['name'] . '&amp;score=' .
        $row['score'] . '&amp;screenshot=' . $row['screenshot'] .
        '">Remove</a></td>';
    if ($row['approved'] == 0)
    {
      echo '<td><a href="approvescore.php?id=' . $row['id'] . '&amp;date=' .
        $row['date'] . '&amp;name=' . $row['name'] . '&amp;score=' .
        $row['score'] . '&amp;screenshot=' . $row['screenshot'] .
        '">Approve</a></td>';
    }
    echo '</tr>';
}

echo '</table>';


mysqli_close($dbc);
?>

</body>
</html>
