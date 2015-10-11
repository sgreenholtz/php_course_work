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
    $post = mysqli_real_escape_string($dbc, $row['BlogPost']);
    $title = mysqli_real_escape_string($dbc, $row['Title']);
?>
    <tr>
        <td><strong><?= $row['Title'] ?></strong><td>
        <td>&nbsp;&nbsp;&nbsp;</td> <!--whitespace for reading clarity -->
        <td><?= $row['DatePosted'] ?></td>
        <td>
            <a href="delete_post.php?ID=<?= $row['ID'] ?>&amp;Title=<?= $title ?>
            &amp;BlogPost=<?= $row['BlogPost'] ?>&amp;DatePosted=<?= $row['DatePosted'] ?>">
                Delete</a></td>
<!--        <td><a href="edit_post.php?ID=' . $row['ID'] . '&amp;Title=' .
        $title . '&amp;BlogPost=' . $post . '&amp;DatePosted=' .
        $row['DatePosted'] . '">Edit</a></td>'; -->
    </tr>
<?php
}

echo '</table>';
echo '</div>';

mysqli_close($dbc);

require_once('../footer.php');

?>