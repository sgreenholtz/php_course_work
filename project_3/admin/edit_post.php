<?php

require_once('../header.php');
require_once('authenticate.php');
require_once('../connectvars.php');

if (isset($_GET['ID']) && isset($_GET['Title']) &&
        isset($_GET['BlogPost']) && isset($_GET['DatePosted']))
    {
        $id = $_GET['ID'];
        $title = $_GET['Title'];
        $blog_post = $_GET['BlogPost'];
        $date = $_GET['DatePosted'];
?>

<div class="content">

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="blogform">

        <!-- id should be carried through in hidden form element -->
        <input type="hidden" name="id" value="<?= $id ?>" />

        <!--Set the title-->
        <label for="title"><h3 id="postTitleLabel">Title: </label>
        <input type="text" name="title" id="postTitleContent" value="<?= $title ?>"/> <br /><br />

        <!--Write the post-->
        <textarea name="blogpost" for="blogform"><?= $blog_post ?></textarea>
        <br /><br />

        <!--Submit-->
        <input type="submit" value="Submit" name="Submit" id="submit" /></h2>

    </form>

<?php
    }
    else if (isset($_POST['id']) && isset($_POST['title']) &&
            isset($_POST['blogpost']))
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $entry = $_POST['blogpost'];
    }

    if (isset($_POST['Submit']))
    {
        $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        $query = "UPDATE posts SET title='$title', blogpost='$entry'" .
            "WHERE id='$id'";
        $result = mysqli_query($dbc, $query)
            or die("Failed in query: " . $query);

        if ($result)
        {
            header('Location: ../index.php'); // return to main page to see the post
        }
        else
        {
            exit("Failed to upload blog post");
        }
    }

    require_once('../footer.php');
?>