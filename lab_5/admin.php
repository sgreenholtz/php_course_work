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

$remove_query = "DELETE FROM uploads WHERE screenshot is NULL";
$remove_result = mysqli_query($dbc, $remove_query);

$select_query = "SELECT * FROM uploads WHERE screenshot is NULL";
$select_result = mysqli_query($dbc, $select_query);

echo '<table>';

while ($row = mysqli_fetch_array($select_result))
{
    echo '<tr><td>';
    echo 'Score: '. $row['score'] . '<br />';
    echo 'Name:</strong> ' . $row['name'] . '<br />';
    echo 'Date:</strong> ' . $row['date'] . '</td></tr>';
}

echo '</table>';

mysqli_close($dbc);
?>

</body>
</html>
