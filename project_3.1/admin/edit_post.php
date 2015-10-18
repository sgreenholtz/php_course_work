<?php

require_once('../header.php');
require_once('authenticate.php');
require_once('../connectvars.php');

if (isset($_GET['ID']) && isset($_GET['Title']) && isset($_GET['DatePosted']))
    {
        $id = $_GET['ID'];
        $title = $_GET['Title'];
        $date = $_GET['DatePosted'];

        $get_blog_post = "SELECT BlogPost FROM posts WHERE id=$id";
        $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $blog_post = mysqli_fetch_array(mysqli_query($dbc, $get_blog_post))[0];
?>

<div class="col-md-12">

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"
        class="form-horizontal" id="blogform">
        <input type="hidden" name="id" value="<?= $id ?>" />

        <fieldset>
            <div class="form-group">
                <div class="col-lg-10">
                    <input type="text" name="title" id="title" class="form-control" value="<?= $title ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10">
                    <textarea name="blogpost" for="blogform" class="form-control"><?= $blog_post ?></textarea>
                </div>
            </div>

        <input class="btn btn-primary" type="submit" value="Submit" name="Submit" id="submit" /></h2>

        </fieldset>
    </form>
</div>

<?php
    }
    else if (isset($_POST['id']) && isset($_POST['title']) &&
            isset($_POST['blogpost']))
    {
        $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $id = $_POST['id'];
        $title = mysqli_real_escape_string($dbc, $_POST['title']);
        $entry = mysqli_real_escape_string($dbc, $_POST['blogpost']);
    }

    if (isset($_POST['Submit']))
    {
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