<?php
    include('header.php');
?>

<h2>Add a New Post</h2>

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

    include('footer.php');
?>