<!DOCTYPE html>
<html>

    <head>
        <title>Sebastian's Blog</title>

        <link href="css/blog.css" rel="stylesheet" />
        <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </head>

    <body>

    <header>
        <h1>Add a New Post</h1>
    </header>

    <div class="content">

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="blogform">

        <!--Set the title-->
        <label for="title"><h2 id="postTitleLabel">Title: </label>
        <input type="text" name="title" id="postTitleContent" /><br /></h2>

        <!--Write the post-->
        <textarea name="blogpost" for="blogform">Enter blog post here.</textarea>


        <!--Submit-->
        <input type="submit" value="Submit" name="Submit" />
    </form>

<?php

    // form submission - add to the database
    require_once('connectvars.php');

    if (isset($_POST['Submit']))
    {
        $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        $title = $_POST['title'];
        $entry = $_POST['blogpost'];
        $date = date('YYYY-MM-DD');

        $query = "INSERT INTO posts VALUES ('$title', '$entry', '$date')";
        $result = mysqli_query($dbc, $query)
            or die("Failed to upload your blog post.");

    } // end of if submitted



    include('footer.php');
?>