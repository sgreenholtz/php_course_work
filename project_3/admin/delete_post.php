<?php

require_once('../header.php');
require_once('../connectvars.php');

if (isset($_GET['ID']) && isset($_GET['Title']) && isset($_GET['DatePosted']))
{
    $id = $_GET['ID'];
    $title = $_GET['Title'];
    $date = $_GET['DatePosted'];
?>

    <div class="col-md-12">
        <p><h3>Are you sure you want to delete this post?</h3></p>
        <p>Title: <?= $title ?></p>
        <p>Date: <?= $date ?></p>
    </div>
<?php
}
else if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['date']))
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
}

    if (isset($_POST['Submit']))
    {
        if ($_POST['remove'] == "yes")
        {
            $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

            $query = "DELETE FROM posts WHERE ID = $id LIMIT 1";
            mysqli_query($dbc, $query)
                or die('Failed to delete: ' . $query);

            mysqli_close($dbc);
    ?>

    <div class="col-md-12">
        <p>Removed: <?= $title ?></p>
        <p>Date: <?= $date ?></p>
    </div>

    <?php
        }
        else
        { ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p>Error deleting post.</p>
            </div>
        <?php }
    }

    else
    {
    ?>

    <div class="col-md-12">
        <form method="post" action="delete_post.php"/>
            <div class="radios">
                <label>
                    <input type="radio" name="remove" value="yes" />
                    Yes
                </label>

                <label>
                    <input type="radio" name="remove" value="no" checked="checked" />
                    No
                </label>
            </div>

            <input type="hidden" name="id" value="<?= $id ?>" />
            <input type="hidden" name="title" value="<?= $title ?>" />
            <input type="hidden" name="date" value="<?= $date ?>" />

            <br />
            <input type="Submit" value="Submit" class="btn btn-danger" name="Submit" />
        </form>
    </div>
    <?php
    }
    ?>


    <ul class="breadcrumb">
        <li><a href="delete_edit.php">← Back to delete or edit page</a></li>
    </ul>

<?php
require_once('../footer.php');
?>