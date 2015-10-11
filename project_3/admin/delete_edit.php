<?php

require_once('../header.php');
require_once('authenticate.php');
require_once('../connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
    or die('Error connecting to the database');

$select_query = "SELECT * FROM posts";
$select_result = mysqli_query($dbc, $select_query);

echo '<div class="content">';
echo '<table>';

while ($row = mysqli_fetch_array($select_result))
{
    echo '<tr>';
    echo '<td><strong>' . $row['Title'] . '</strong><td>';
    echo '<td>&nbsp;&nbsp;&nbsp;</td>'; // whitespace for reading clarity
    echo '<td>' . $row['DatePosted'] . '</td>';
    echo '<td><a href="delete_post.php?ID=' . $row['ID'] . '&amp;Title=' .
        $row['Title'] . '&amp;BlogPost=' . $row['BlogPost'] . '&amp;DatePosted=' .
        $row['DatePosted'] . '">Delete</a></td>';
    echo '<td><a href="edit_post.php?ID=' . $row['ID'] . '&amp;Title=' .
        $row['Title'] . '&amp;BlogPost=' . $row['BlogPost'] . '&amp;DatePosted=' .
        $row['DatePosted'] . '">Edit</a></td>';
    echo '</tr>';
}

echo '</table>';
echo '</div>';

mysqli_close($dbc);

require_once('../footer.php');

?>