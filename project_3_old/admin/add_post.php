<?php
    include_once('../header.php');
    require_once('authenticate.php');
?>

<div class="content">

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="blogform">

        <!--Set the title-->
        <label for="title"><h3 id="postTitleLabel">Title: </label>
        <input type="text" name="title" id="postTitleContent" /> <br /><br />

        <!--Write the post-->
        <textarea name="blogpost" for="blogform"></textarea>
        <br /><br />

        <!--Submit-->
        <input type="submit" value="Submit" name="Submit" id="submit" /></h2>

    </form>

<?php

    // form submission - add to the database
    require_once('../connectvars.php');

    if (isset($_POST['Submit']))
    {
        $dbc = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        $title = mysqli_real_escape_string($dbc, $_POST['title']);
        $entry = mysqli_real_escape_string($dbc, $_POST['blogpost']);
        $date = date('Y-m-d');

        $query = "INSERT INTO posts (Title, BlogPost, DatePosted) " .
            "VALUES ('$title', '$entry', '$date')";
        $result = mysqli_query($dbc, $query)
            or die("Failed to insert: " . $query);

        if ($result)
        {
            header('Location: ../index.php'); // return to main page to see the post
        }

    } // end of if submitted



    include('../footer.php');
?>