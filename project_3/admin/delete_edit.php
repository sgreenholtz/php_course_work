<?php

require_once('../header.php');
require_once('../connectvars.php');

$dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME)
    or die('Error connecting to the database');

$select_query = "SELECT * FROM posts";
$select_result = mysqli_query($dbc, $select_query);
?>

<div class="col-md-12">
    <table class="table table-striped table-hover ">

<?php
while ($row = mysqli_fetch_array($select_result))
{
?>
    <tr>
        <td><h4><?= $row['Title'] ?></h4><td>
        <td><h5><?= $row['DatePosted'] ?></h5></td>
        <td>
            <a class="btn btn-danger" href="delete_post.php?ID=<?= $row['ID'] ?>&amp;Title=<?= $row['Title'] ?>
            &amp;DatePosted=<?= $row['DatePosted'] ?>">Delete</a>
        </td>
        <td>
            <a class="btn btn-warning" href="edit_post.php?ID=<?= $row['ID'] ?>&amp;Title=<?= $row['Title'] ?>
            &amp;DatePosted=<?= $row['DatePosted'] ?>">Edit</a>
        </td>
    </tr>
<?php
}
?>
    </table>
</div>

<?php
mysqli_close($dbc);

require_once('../footer.php');

?>