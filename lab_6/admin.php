<?php
  $username = 'rock';
  $password = 'roll';

  if (!isset($_SERVER['PHP_AUTH_USER']) ||
      (!isset($_SERVER['PHP_AUTH_PW'])) ||
      $_SERVER['PHP_AUTH_USER'] != $username ||
      $_SERVER['PHP_AUTH_PW'] != $password)
      {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Guitar Wars');
        exit('<h2>Guitar Wars</h2>Sorry, you must enter a valid username and ' .
          'password to access this page.');
      }
?>

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
        '">Remove</a></td></tr>';
}

echo '</table>';


mysqli_close($dbc);
?>

</body>
</html>
