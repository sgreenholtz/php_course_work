<?php
    include('header.php');
?>

<h1>Add a New Post</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">

    <!--Set the title-->
    <input type="text" name="title" /><br />

    <!--Write the post-->
    <input type="textarea" name="blogpost"/><br />

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