<?php
    include_once('../header.php');
    require_once('authenticate.php');
    require_once('../connectvars.php');
?>


<div class="col-lg-12">

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"
        class="form-horizontal" id="blogform">
        <input type="hidden" name="id" />

        <fieldset>
            <div class="form-group">
                <div class="col-lg-10">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10">
                    <textarea name="blogpost" for="blogform" class="form-control"></textarea>
                </div>
            </div>

        <input class="btn btn-primary" type="submit" value="Submit" name="Submit" id="submit" /></h2>

        </fieldset>
    </form>
</div>

<?php

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
            header('Location: ../index.php');
        }

    }

    include('../footer.php');
?>