<?php

require_once('../header.php');
require_once('authenticate.php');
require_once('../connectvars.php');

if (isset($_GET['ID']) && isset($_GET['Title']) && isset($_GET['DatePosted']))
    {
        $id = $_GET['ID'];
        $title = $_GET['Title'];
        $date = $_GET['DatePosted'];
    ?>
    <div class="content">
        <p>Are you sure you want to delete this post?</p>
        <table>
            <tr>
                <td><strong>Title: </strong></td>
                <td><?= $title ?></td>
            </tr>
            <tr>
                <td><strong>Date: </strong></td>
                <td><?= $date ?></td>
            </tr>
        </table>

    <?php
    }
    else if (isset($_POST['id']) && isset($_POST['title']) &&
            isset($_POST['date']))
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $date = $_POST['date'];
    }

    if (isset($_POST['Submit']))
    {
        if ($_POST['remove'] == "yes")
        {
            // Connect to database
            $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

            // Query to delete the specified entry
            $query = "DELETE FROM posts WHERE ID = $id LIMIT 1";
            mysqli_query($dbc, $query)
                or die('Failed to delete: ' . $query);

            mysqli_close($dbc);

            echo "<div class='content'>";
            echo "<p>Removed: " . $title . "<br /> Date: " . $date . "</p>";
            echo "</div>";

        } // end of if remove yes
        else
        {
            echo "<p class='error'>Error deleting post.</p>";
        }
    } // end of if submitted

    else
    {
    ?>

    <form method="post" action="delete_post.php"/>
        <input type="radio" name="remove" value="yes" /> Yes
        <input type="radio" name="remove" value="no" checked="checked" /> No

        <input type="hidden" name="id" value="<?= $id ?>" />
        <input type="hidden" name="title" value="<?= $title ?>" />
        <input type="hidden" name="date" value="<?= $date ?>" />

        <br />
        <input type="Submit" value="Submit" name="Submit" />
    </form>
    </div>

    <?php
    }
    ?>

    <div class="content">
        <p><a href="delete_edit.php">&lt;&lt; Back to delete or edit page</a></p>
    </div>

<?php
require_once('../footer.php');
?>