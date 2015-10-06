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
    
    include('footer.php');
?>