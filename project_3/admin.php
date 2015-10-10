<?php

require_once('header.php');
require_once('authenticate.php');
require_once('connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
    or die('Error connecting to the database');

$select_query = "SELECT * FROM posts";
$select_result = mysqli_query($dbc, $select_query);

echo '<table>';

while ($row = mysqli_fetch_array($select_result))
{
    echo '<tr>';
    echo '<td><strong>' . $row['name'] . '</strong><td>';
    echo '<td>'. $row['score'] . '</td>';
    echo '<td>&nbsp;&nbsp;&nbsp;</td>'; // whitespace for reading clarity
    echo '<td>' . $row['date'] . '</td>';
    echo '<td><a href="editpost.php?id=' . $row['id'] . '&amp;date=' .
        $row['date'] . '&amp;name=' . $row['name'] . '&amp;score=' .
        $row['score'] . '&amp;screenshot=' . $row['screenshot'] .
        '">Edit</a></td>';
    if ($row['approved'] == 0)
    {
      echo '<td><a href="removepost.php?id=' . $row['id'] . '&amp;date=' .
        $row['date'] . '&amp;name=' . $row['name'] . '&amp;score=' .
        $row['score'] . '&amp;screenshot=' . $row['screenshot'] .
        '">Remove</a></td>';
    }
    echo '</tr>';
}

echo '</table>';


mysqli_close($dbc);

require_once('footer.php');

?>