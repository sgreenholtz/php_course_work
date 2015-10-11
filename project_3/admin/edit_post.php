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
    require_once('../footer.php');
?>